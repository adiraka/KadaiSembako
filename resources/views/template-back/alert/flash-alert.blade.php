<div class="row">
	<div class="col-md-12">
		@if (Session::has('sukses'))
			<div class="alert alert-info">
				{{ Session::get('sukses') }}
			</div>
		@elseif(Session::has('gagal'))
			<div class="alert alert-danger">
				{{ Session::get('gagal') }}
			</div>
		@endif
	</div>
</div>