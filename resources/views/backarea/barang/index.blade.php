@extends('template-back.layout')

@section('headerText', 'Produk')

@section('content')

@include('template-back.alert.validate-alert')

@include('template-back.alert.flash-alert')

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Form Input Data Produk</h2>
			</div>
			<div class="panel-body no-padding">
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="kategori_id">Kategori Produk</label>
						<select name="kategori_id" id="kategori_id" class="form-control">
							<option value="" selected="selected"></option>
							@foreach ($kategoris as $kategori)
								<option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="nm_barang">Nama Produk</label>
						<input type="text" class="form-control" name="nm_barang" name="nm_barang" value="">
					</div>
					<div class="form-group">
						<label for="qty">Stok Produk</label>
						<input type="text" class="form-control" name="qty" name="qty" value="">
					</div>
					<div class="form-group">
						<label for="satuan_id">Satuan Produk</label>
						<select name="satuan_id" id="satuan_id" class="form-control">
							<option value="" selected="selected"></option>
							@foreach ($satuans as $satuan)
								<option value="{{ $satuan->id }}">{{ $satuan->nm_satuan }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="harga">Harga Produk</label>
						<input type="text" class="form-control" name="harga" name="harga" value="">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan Produk</label>
						<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default" value="Simpan">&nbsp;
						<input type="reset" class="btn btn-default" value="Reset">&nbsp;
						<a href="#" class="btn btn-default">Lihat Data Barang</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection