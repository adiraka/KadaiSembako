<div class="col-md-5">
    <div class="checkout-right">
        <h4>Pesanan Anda</h4>
        <div class="aa-order-summary-area">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjang as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>IDR {{ number_format($item->price, 0) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>IDR {{ number_format($item->subtotal, 0) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>SUBTOTAL</strong></td>
                        <td></td>
                        <td>{{ Cart::count() }}</td>
                        <td>IDR {{ Cart::total(0, '', ',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>ONGKIR</strong></td>
                        <td>IDR 5,000</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>TOTAL</strong></td>
                        <td><strong>IDR {{ number_format((int)Cart::total()+5000, 0) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h4>Metode Pembayaran</h4>
        <div class="aa-payment-method">                    
            <form action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="cashdelivery"><input type="radio" id="cashdelivery" name="metode" value="Cash On Delivery"> Cash on Delivery </label>
                <label for="paypal"><input type="radio" id="paypal" name="metode" value="Transfer Rekening"> Transfer Rekening </label>
                <hr>
                <label for="term"><input type="checkbox" name="term">&nbsp;<small>Saya setuju dengan semua syarat dan ketentuan yang ada.</small></label>
                <hr>
                <input type="submit" value="Place Order" class="aa-browse-btn">
            </form>
        </div>
    </div>
</div>