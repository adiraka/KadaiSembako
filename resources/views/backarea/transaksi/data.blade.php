@extends('template-back.layout')

@section('headerText', 'Data Transaksi')

@section('content')

@include('template-back.alert.validate-alert')

@include('template-back.alert.flash-alert')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Tabel Transaksi Yang Telah di Validasi</h2>
			</div>
			<div class="panel-body no-padding">
				<div class="resposive-table">
					<table class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							<tr>
								<th width="50">ID</th>
								<th>Email</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Tanggal</th>
								<th>Metode</th>
								<th>Total Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($transaksis as $transaksi)
								<tr>
									<td>{{ $transaksi->id }}</td>
									<td>{{ $transaksi->user->email }}</td>
									<td>{{ $transaksi->user->nama }}</td>
									<td>{{ $transaksi->user->alamat }}</td>
									<td>{{ $transaksi->tgl }}</td>
									<td>{{ $transaksi->metode }}</td>
									<td>IDR {{ number_format($transaksi->total_bayar, 0) }}</td>
									<td>
										<a href="{{ route('detailTransaksi', ['id' => $transaksi->id]) }}" class="btn btn-xs btn-default">Detail</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $transaksis->links() }}
				</div>	
			</div>
		</div>
	</div>
</div>

@endsection