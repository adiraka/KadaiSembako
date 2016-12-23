@extends('template.layout')

@section('content')

<section id="aa-catg-head-banner">
  <img src="{{ asset('asset-front/img/header/produk.jpg') }}" width="100%" height="300px" alt="fashion img">
</section>

<section id="cart-view">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cart-view-area">
					<div class="cart-view-table">
						<form action="{{ route('ubahKeranjang') }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th></th>
											<th></th>
											<th>Produk</th>
											<th>Harga</th>
											<th>Qty</th>
											<th>Satuan</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										@if (count($keranjangs))
											@foreach ($keranjangs as $item)
												<tr>
													<input type="hidden" name="id[]" value="{{ $item->id }}">
													<td><a class="remove" href="{{ route('hapusKeranjang', ['id' => $item->id]) }}"><fa class="fa fa-close"></fa></a></td>
													<td><a href="#"><img src="{{ asset('asset-front/img/man/polo-shirt-1.png') }}" alt="img"></a></td>
													<td><a class="aa-cart-title" href="#">{{ $item->name }}</a></td>
													<td>{{ $item->price }}</td>
													<td><input class="aa-cart-quantity" type="number" name="qty[]" value="{{ $item->qty }}"></td>
													<td>{{ $item->options->first() }}</td>
													<td>{{ $item->subtotal }}</td>
												</tr>
											@endforeach
										@endif
										<tr>
											<td colspan="7" class="aa-cart-view-bottom">
												<div class="aa-cart-coupon">
													<a href="{{ route('produk') }}" class="aa-coupon-code">Lanjut Belanja</a>
												</div>
												<input class="aa-cart-view-btn" type="submit" value="Update Keranjang">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
						<div class="cart-view-total">
							<h4>Total Belanja</h4>
							<table class="aa-totals-table">
								<tbody>
									<tr>
										<th>Total</th>
										<td>IDR {{ Cart::subtotal() }}</td>
									</tr>
								</tbody>
							</table>
							<a href="{{ route('pembayaran') }}" class="aa-cart-view-btn">Pembayaran</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('frontarea.partials.subscribe')
@endsection