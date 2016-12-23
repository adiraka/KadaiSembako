@extends('template.layout')

@section('content')

<section id="aa-catg-head-banner">
  <img src="{{ asset('asset-front/img/header/masuk.jpg') }}" width="100%" height="300px" alt="fashion img">
</section>

<section id="aa-myaccount">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-myaccount-area"> 
					@include('template.partials.alert')   
					<div class="row">
						<div class="col-md-6">
							<div class="aa-myaccount-login">
								<h4>Masuk KadaiSembako.id</h4>
								@include('template.partials.form-alert')
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
								<h4>Syarat dan Ketentuan :</h4>
								<ol>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum perspiciatis impedit rem. Non pariatur iste omnis alias, sit odio, et quis animi quisquam possimus consectetur qui dolores quaerat, asperiores numquam!
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eligendi voluptatem beatae, accusamus magni quasi, enim nesciunt fugiat iste odio accusantium perspiciatis, quam expedita fuga tempora culpa sunt, optio cumque!
									</li>
									<li>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam et, blanditiis eligendi provident laborum. Quaerat necessitatibus, nisi repudiandae tenetur inventore voluptatem obcaecati ducimus error illum hic ex veritatis recusandae magnam!
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