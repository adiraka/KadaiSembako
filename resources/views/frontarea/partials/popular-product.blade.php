<section id="aa-popular-category">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="aa-popular-category-area">
                  <ul class="nav nav-tabs aa-products-tab">
                     <li class="active"><a href="#popular" data-toggle="tab">Selamat Datang di Kadai Sembako</a></li>                 
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="popular">
                        <ul class="aa-product-catg aa-popular-slider">
                           @foreach ($barangs as $barang)
                           <li>
                              <figure>
                                 <a class="aa-product-img" href="#"><img src="{{ asset('asset-front/img/man/polo-shirt-2.png') }}" alt="polo shirt img"></a>
                                 <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                 <figcaption>
                                    <h4 class="aa-product-title"><a href="#">{{ $barang->nm_barang }}</a></h4>
                                    <span class="aa-product-price">IDR {{ $barang->harga }}</span>
                                 </figcaption>
                              </figure>
                              <div class="aa-product-hvr-content">
                                 <p>
                                    {{ str_limit($barang->keterangan, 50) }}
                                 </p>
                              </div>
                              <span class="aa-badge aa-sale" href="#">Stok: {{ $barang->qty.' '.$barang->satuan->nm_satuan }}</span>
                           </li>
                           @endforeach   
                        </ul>
                        <a class="aa-browse-btn" href="#">Lihat Semua Produk <span class="fa fa-long-arrow-right"></span></a>
                     </div>         
                  </div>
               </div>
            </div> 
         </div>
      </div>
   </div>
</section>