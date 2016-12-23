<div class="left-side sticky-left-side">
	<div class="logo">
		<h1><a href="index.html">Admin <span>Kadai</span></a></h1>
	</div>
	<div class="logo-icon text-center">
		<a href="{{ route('adminHome') }}"><i class="fa fa-home"></i> </a>
	</div>
	<div class="left-side-inner">
		<ul class="nav nav-pills nav-stacked custom-nav">
			<li>
				<a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
			</li>
			<li class="menu-list">
				<a href="#">
					<i class="fa fa-book"></i><span>Atribut Produk</span>
				</a>
				<ul class="sub-menu-list">
					<li><a href="{{ route('kategori') }}">Kelola Kategori</a> </li>
					<li><a href="{{ route('satuan') }}">Kelola Satuan</a></li>
				</ul>
			</li>
			<li class="menu-list">
				<a href="#">
					<i class="fa fa-file-text"></i><span>Manajemen Produk</span>
				</a>
				<ul class="sub-menu-list">
					<li><a href="{{ route('barang') }}">Tambah Produk</a> </li>
					<li><a href="{{ route('barangData') }}">Data Produk</a></li>
				</ul>
			</li>
			<li class="menu-list">
				<a href="#">
					<i class="fa fa-gear"></i><span>Transaksi</span>
				</a>
				<ul class="sub-menu-list">
					<li><a href="{{ route('validasiTransaksi') }}">Validasi Transaksi</a> </li>
					<li><a href="{{ route('dataTransaksi') }}">Data Transaksi</a></li>
				</ul>
			</li>
			<li>
				<a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i><span>Keluar</span></a>
			</li>
		</ul>
	</div>
</div>