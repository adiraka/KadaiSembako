@extends('template.layout')

@section('content')

<section id="aa-catg-head-banner">
  <img src="{{ asset('asset-front/img/header/produk.jpg') }}" width="100%" height="300px" alt="fashion img">
</section>

<section id="checkout">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="checkout-area">
					<div class="row">
						<div class="container">
							@include('template.partials.alert')
							@include('template.partials.form-alert')
						</div>
						@include('frontarea.partials.pembayaran-side')
						@include('frontarea.partials.pembayaran-right')
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('frontarea.partials.subscribe')
@endsection