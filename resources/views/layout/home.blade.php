<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard User</title>
  <link rel="icon" href="{{ asset('assets/icon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet"/>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <header>
      <nav>
        <div class="logo">
          <img src="{{ asset('Aset/images.png') }}" alt="Logo" />
        </div>
        <ul>
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li><a href="{{ url('/tambahpembayaran') }}">Pembayaran</a></li>
          @if(session('status') != "login")
            <li><a href="{{ url('/login') }}">Login</a></li>
          @else
            <li><a href="{{ url('/logout') }}">Logout</a></li>
          @endif
        </ul>
      </nav>
    </header>
    <main>
      <div class="center">
        <div class="form-login">
          <h3>Selamat Datang Di CALISTUNG E-Learning, {{ session('username') }}</h3>
        </div>
      </div>
    </main>
    <footer>
      <h4>&copy; Calistung 2023</h4>
    </footer>
  </div>
</body>
</html>