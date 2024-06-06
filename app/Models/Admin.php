<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable {
    use HasFactory;
    use Authenticatable;
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $dates1 = ['updated_at'];
    protected $primaryKey = 'id';
}