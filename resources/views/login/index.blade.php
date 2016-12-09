@extends('template.layout')

@section('content')

@include('template.partials.banner')

<section id="aa-myaccount">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-myaccount-area"> 
					@include('template.partials.alert')
					@include('template.partials.form-alert')   
					<div class="row">
						<div class="col-md-6">
							<div class="aa-myaccount-login">
								<h4>Masuk</h4>
								<form action="{{ route('login') }}" class="aa-login-form" method="POST">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<label for="email">Email <span>*</span></label>
									<input type="text" name="email" id="email">
									<label for="password">Password <span>*</span></label>
									<input type="password" name="password" id="password">
									<button type="submit" class="aa-browse-btn">Login</button>
									{{-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
									<p class="aa-lost-password"><a href="#">Lost your password?</a></p> --}}
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="aa-myaccount-register">                 
								<h4>Daftar</h4>
								<form action="{{ route('register') }}" class="aa-login-form" method="POST">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<label for="">Email <span>*</span></label>
									<input type="text" name="email">
									<label for="">Password <span>*</span></label>
									<input type="password" name="password">
									<label for="">Konfirmasi Password <span>*</span></label>
									<input type="password" name="password_confirmation">
									<label for="">Nama Lengkap <span>*</span></label>
									<input type="text" name="nama">
									<label for="">Tempat Lahir <span>*</span></label>
									<input type="text" name="tmplahir">
									<label for="">Tanggal Lahir <span>*</span></label>
									<input type="text" name="tgllahir">
									<label for="">Jenis Kelamin <span>*</span></label>
									<select name="jekel" id="">
										<option value="" selected>--Pilih Jenis Kelamin--</option>
										<option value="Pria">Pria</option>
										<option value="Wanita">Wanita</option>
									</select>
									<label for="">Alamat Lengkap <span>*</span></label>
									<textarea name="alamat" id=""></textarea>
									<label for="">Telepon <span>*</span></label>
									<input type="text" name="telepon">
									<button type="submit" class="aa-browse-btn">Register</button>
								</form>
							</div>
						</div>
					</div>          
				</div>
			</div>
		</div>
	</div>
</section>

@endsection