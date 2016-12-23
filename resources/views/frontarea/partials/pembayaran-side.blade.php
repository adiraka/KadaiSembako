<div class="col-md-7">
    <div class="checkout-left">
        <div class="panel-group" id="accordion">
            @if (!Auth::check())
                <div class="panel panel-default aa-checkout-login">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Masuk 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse  in">
                        <div class="panel-body">
                        <p>Sebelum melanjutkan ke sesi transaksi, anda harus login terlebih dahulu. Jika anda belum mempunyai aku silahkan daftar <a href="{{ route('register') }}">disini.</a></p>
                            <form action="{{ route('login') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" name="email" placeholder="Email">
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" class="aa-browse-btn">Login</button>
                            </form>
                            {{-- <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> --}}
                            {{-- <p class="aa-lost-password"><a href="#">Lost your password?</a></p> --}}
                        </div>
                    </div>
                </div>
            @endif
            <div class="panel panel-default aa-checkout-login">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Syarat dan Ketentuan 
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis nihil, asperiores molestias, facilis harum ab molestiae amet possimus sit, illum dicta sint quam minima vel similique doloribus cumque nesciunt.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere enim dolore sint eius explicabo perspiciatis autem pariatur nostrum consequuntur quas eaque commodi maxime ex, voluptates placeat illo eveniet beatae. Voluptas.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus enim adipisci accusamus cum sequi, quod sed, maxime velit, libero ea, repellendus beatae. Perferendis laborum maxime aperiam harum voluptatibus delectus illum?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolorum nostrum possimus. Optio soluta iure voluptatum facere, cumque tempora alias consequatur consequuntur voluptas ad, repellat minima, delectus. Aperiam, placeat, iste.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>