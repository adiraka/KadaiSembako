@extends('template-back.layout')

@section('headerText', 'Detail Transaksi')

@section('content')

@include('template-back.alert.validate-alert')

@include('template-back.alert.flash-alert')

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Detail Transaksi</h2>
			</div>
			<div class="panel-body no-padding">
				<div class="row">
					<div class="col-md-3">
						<strong>ID Transaksi</strong>
					</div>
					<div class="col-md-9">
						{{ $transaksi->id }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<strong>Nama</strong>
					</div>
					<div class="col-md-9">
						{{ $transaksi->user->nama }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<strong>Jenis Kelamin</strong>
					</div>
					<div class="col-md-9">
						{{ $transaksi->user->jekel }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<strong>Telepon</strong>
					</div>
					<div class="col-md-9">
						{{ $transaksi->user->telepon }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<strong>Alamat</strong>
					</div>
					<div class="col-md-9">
						{{ $transaksi->user->alamat }}
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-hovered table-striped">
							<thead>
								<th>ID</th>
								<th>Nama</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Total</th>
							</thead>
							<tbody>
								@foreach ($transaksi->detail as $detail)
									<tr>
										<td>{{ $detail->barang->id }}</td>
										<td>{{ $detail->barang->nm_barang }}</td>
										<td>{{ $detail->qty }}</td>
										<td>IDR {{ number_format($detail->harga, 0) }}</td>
										<td>IDR {{ number_format($detail->subtotal, 0) }}</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="4"><strong>Subtotal</strong></td>
									<td>IDR {{ number_format($transaksi->total_bayar - 5000, 0) }}</td>
								</tr>
								<tr>
									<td colspan="4"><strong>Ongkir</strong></td>
									<td>IDR {{ number_format(5000, 0) }}</td>
								</tr>
								<tr>
									<td colspan="4"><strong>Total Bayar	</strong></td>
									<td><b>IDR {{ number_format($transaksi->total_bayar, 0) }}</b></td>
								</tr>
							</tbody>
						</table>
						<div class="form-group">
							<a href="" class="btn btn-default">Cetak</a>&nbsp;
							<a href="{{ route('validasiTransaksi') }}" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection