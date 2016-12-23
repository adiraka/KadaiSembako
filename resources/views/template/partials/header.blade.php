<header id="aa-header">
  <div class="aa-header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-top-area">
            <div class="aa-header-top-left">
              <div class="cellphone hidden-xs">
                <p><span class="fa fa-phone"></span>+62 812 1234 1234</p>
              </div>
            </div>
            <div class="aa-header-top-right">
              <ul class="aa-head-top-nav-right">
                <li><a href="account.html">Akun Saya</a></li>
                <li class="hidden-xs"><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
                @if (Auth::check())
                  <li><a href="{{ route('logout') }}">Keluar</a></li>
                @else
                  <li><a href="{{ route('register') }}">Daftar</a></li>
                  <li><a href="{{ route('login') }}">Masuk</a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="aa-header-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-bottom-area">
            <div class="aa-logo">
              <a href="index.html">
                <span class="fa fa-shopping-cart"></span>
                <p>Kadai<strong>Sembako.id</strong> <span>Partner Belanja Anda</span></p>
              </a>
            </div>
            <div class="aa-cartbox">
              <a class="aa-cart-link" href="{{ route('keranjang') }}">
                <span class="fa fa-shopping-basket"></span>
                <span class="aa-cart-title">Keranjang Belanja</span>
                {{-- <span class="aa-cart-notify">{{ count(Cart::content()) }}</span> --}}
              </a>
            </div>
            <div class="aa-search-box">
              <form action="">
                <input type="text" name="" id="" placeholder="Cari yang anda butuhkan disini">
                <button type="submit"><span class="fa fa-search"></span></button>
              </form>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</header>