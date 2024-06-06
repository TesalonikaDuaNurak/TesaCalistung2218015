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
      <div class="justified">
        <div class="form-login">
          <h3>Input Pembayaran</h3>
          <form action="/insertdata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pendaftar</label>
               <select name="id_user" id="">
                @foreach ($user as $d)
                <option value="{{$d->id}}">{{$d->nama}}</option>
                @endforeach
               </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Paket</label>
               <select name="id_paket" id="">
                @foreach ($paket as $d)
                <option value="{{$d->id_paket}}">{{$d->nama_paket}}</option>
                @endforeach
               </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">ID Pembayaran</label>
                <input type="text" name="id_pembayaran" class="form-control" id="exampleInputPassword1" placeholder="ID Pembayaran">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Total</label>
                <input type="text" name="total" class="form-control" id="exampleInputPassword1" placeholder="Total Pembayaran">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Bukti Pembayaran</label>
                <input type="file" name="foto" class="form-control" id="exampleInputPassword1" placeholder="Jenis Makanan" accept="image/*">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status Pembayaran</label>
               <select name="status_bayar" id="">
                <option value="Belum Lunas">Belum Lunas</option>
                <option value="Lunas">Lunas</option>
               </select>
              </div>
            
            <button type="submit" class="btn btn-simpan">
                Simpan
            </button>
        </form>
        </div>
      </div>
    </main>
    <footer>
      <h4>&copy; Calistung 2023</h4>
    </footer>
  </div>
</body>
</html>