<div class="row">
	<div class="col-md-12">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li><span class="fa fa-times">&nbsp;</span>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>    