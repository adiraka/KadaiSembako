@extends('template.layout')

@section('content')

<section id="aa-catg-head-banner">
  <img src="{{ asset('asset-front/img/header/daftar.jpg') }}" width="100%" height="300px" alt="fashion img">
</section>

<section id="aa-myaccount">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-myaccount-area"> 
					@include('template.partials.alert')   
					<div class="row">
						<div class="col-md-6">
							<div class="aa-myaccount-register">                 
								<h4>Daftar Akun :</h4>
								@include('template.partials.form-alert')
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
						<div class="col-md-6">
							<div class="aa-myaccount-login">
								<h4>Syarat dan Ketentuan :</h4>
								<ol>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis nulla animi sunt, dolorem voluptas veritatis perspiciatis impedit quae quod harum tempora, maxime, odio, qui nihil. Neque sit, facere amet velit?
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi adipisci eius dolor consequuntur architecto sit sint corporis eligendi dolorem. Dolorem animi ducimus quibusdam, beatae, qui numquam ullam. Eius, cupiditate, fuga.
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo in blanditiis beatae impedit, nemo voluptate ut, fugit totam unde reprehenderit, maxime, ipsa! Ab voluptas a eum suscipit molestiae quod, accusamus.
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates facere veritatis nemo qui facilis laboriosam modi consequatur nobis aperiam, aliquam officiis eum alias magnam ullam quod nesciunt veniam itaque tempora.
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. At explicabo autem magni consequuntur itaque ipsum, eius dolores reiciendis sunt vero distinctio rem doloribus libero animi in quibusdam labore quos laboriosam.
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab optio suscipit ducimus sapiente aliquam, quasi omnis voluptatum, sed iure ut, rerum sit expedita vel? Corrupti provident deleniti voluptas, sit magni.
									</li>
								</ol>
							</div>
						</div>
					</div>          
				</div>
			</div>
		</div>
	</div>
</section>

@endsection