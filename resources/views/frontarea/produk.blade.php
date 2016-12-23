@extends('template.layout')

@section('content')

<section id="aa-catg-head-banner">
  <img src="{{ asset('asset-front/img/header/produk.jpg') }}" width="100%" height="300px" alt="fashion img">
</section>

<section id="aa-product-category">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
				<div class="aa-product-catg-content">
					<div class="aa-product-catg-head">
						<div class="aa-product-catg-head-left">
							<form action="" class="aa-sort-form form-inline">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Cari Produk">
								</div>
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="aa-product-catg-head-right">
							<a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
							<a id="list-catg" href="#"><span class="fa fa-list"></span></a>
						</div>
					</div>
					<div class="aa-product-catg-body">
						<ul class="aa-product-catg">
							@foreach ($barangs as $barang)
								<li>
									<figure>
										<a class="aa-product-img" href="#"><img src="{{ asset('asset-front/img/women/girl-1.png') }}" alt="polo shirt img"></a>
										<a class="aa-add-card-btn" href="{{ route('tambahKeranjang', ['id' => $barang->id]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
										<figcaption>
											<h4 class="aa-product-title"><a href="#">{{ $barang->nm_barang }}</a></h4>
											<span class="aa-product-price">IDR {{ $barang->harga }}</span>
											<p class="aa-product-descrip">{{ $barang->keterangan }}</p>
										</figcaption>
									</figure>
									<span class="aa-badge aa-sale" href="#">SALE!</span>
								</li>
							@endforeach
						</ul>
						<div class="aa-product-catg-pagination">
							<nav>
								{{ $barangs->links() }}
							</nav>
						</div>
					</div>
				</div>
			</div>
			@include('frontarea.partials.widget')
		</div>
	</div>
</section>

@include('frontarea.partials.subscribe')
@endsection