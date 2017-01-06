<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
    <aside class="aa-sidebar">
        <div class="aa-sidebar-widget">
            <h3>Kategori</h3>
            <ul class="aa-catg-nav">
                @foreach ($kategoris as $kategori)
                    <li><a href="">{{ $kategori->nm_kategori }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="aa-sidebar-widget">
            <h3>Produk Terlaris</h3>
            <div class="aa-recently-views">
                <ul>
                    @foreach ($popular as $barang)
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="{{ asset('asset-front/img/woman-small-2.jpg') }}"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">{{ $barang->nm_barang }}</a></h4>
                                <p>IDR {{ $barang->harga }}</p>
                            </div>                    
                        </li>
                    @endforeach
                </ul>
            </div>                            
        </div>
    </aside>
</div>