@extends('template-back.layout')

@section('headerText', 'Kategori Produk')

@section('content')

@include('template-back.alert.validate-alert')

@include('template-back.alert.flash-alert')

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Form Input Data Kategori</h2>
			</div>
			<div class="panel-body no-padding">
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="nmkategori">Nama Kategori</label>
						<input type="text" class="form-control" name="nmkategori" name="nmkategori" value="">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div class="panel-heading">
				<h2>Tabel Data Kategori</h2>
			</div>
			<div class="panel-body no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th width="50">ID</th>
							<th>Nama Kategori</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th width="50">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($kategoris as $key => $kategori)
							<tr>
								<td>{{ $kategori->id }}</td>
								<td>{{ $kategori->nm_kategori }}</td>
								<td>{{ $kategori->created_at }}</td>
								<td>{{ $kategori->updated_at }}</td>
								<td>
									<form action="{{ route('delKategori') }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="id" value="{{ $kategori->id }}">
										<input type="submit" class="btn btn-xs btn-default" value="Hapus">
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $kategoris->links() }}
			</div>
		</div>
	</div>
</div>

@endsection