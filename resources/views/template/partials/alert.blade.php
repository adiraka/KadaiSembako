<div class="row">
	<div class="col-md-12">
		@if (Session::has('success'))
			<div class="alert alert-info alert-dismissibles" role="alert">
				<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><span class="fa fa-check"></span>&nbsp;</strong> {{ Session::get('success') }}
			</div>
		@elseif (Session::has('alert'))
			 <div class="alert alert-danger alert-dismissibles" role="alert">
				<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><span class="fa fa-times"></span>&nbsp;</strong> {{ Session::get('alert') }}
			</div>
		@endif	
	</div>
</div> 