<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Users;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('layout/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        $admin = Admin::where('username', $credentials['username'])->first();
    
        if ($admin && $admin->password == $credentials['password']) {
            Auth::login($admin);
            $request->session()->regenerate();
            $request->session()->put('status', 'login');
            $request->session()->put('username', $credentials['username']);
            return redirect()->intended('admins');
        }
    
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginForm1()
    {
        return view('layout/loginuser');
    }

    public function loginuser(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        $user = Users::where('username', $credentials['username'])->first();
    
        if ($user && $user->password == $credentials['password']) {
            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->put('status', 'login');
            $request->session()->put('username', $credentials['username']);
            return redirect()->intended('home');
        }
    
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
?>