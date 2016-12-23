@extends('template-back.layout')

@section('headerText', 'Kategori Produk')

@section('content')

@include('template-back.alert.validate-alert')

@include('template-back.alert.flash-alert')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Tabel Data Produk</h2>
			</div>
			<div class="panel-body no-padding">
				<div class="resposive-table">
					<table class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							<tr>
								<th width="50">ID</th>
								<th>Nama Prdouk</th>
								<th>Kategori</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Satuan</th>
								<th>Keterangan</th>
								<th width="11%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($barangs as $key => $barang)
								<tr>
									<td>{{ $barang->id }}</td>
									<td>{{ $barang->nm_barang }}</td>
									<td>{{ $barang->kategori->nm_kategori }}</td>
									<td>{{ $barang->harga }}</td>
									<td>{{ $barang->qty }}</td>
									<td>{{ $barang->satuan->nm_satuan }}</td>
									<td>{{ $barang->keterangan }}</td>
									<td>
										
										<form action="" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="id" value="{{ $barang->id }}">
											<a href="" class="btn btn-xs btn-default">Ubah</a>
											<input type="submit" class="btn btn-xs btn-default" value="Hapus">
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $barangs->links() }}
				</div>	
			</div>
		</div>
	</div>
</div>

@endsection