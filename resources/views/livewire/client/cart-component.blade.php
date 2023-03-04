<div>
    <!-- Page Title -->
    <section class="page-title text-center">
        <div class="container">
            <h1 class=" heading page-title__title">shopping cart</h1>
        </div>
    </section> <!-- end page title -->


    <!-- Cart -->
    <section class="section-wrap cart pt-50 pb-40">
        <div class="container relative">

            <div class="table-wrap">
                <table class="shop_table cart table">
                    {{-- <span class="alert alert-success">123</span> --}}
                    <thead>
                        <tr>
                            <th class="product-name" colspan="2">Sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal" colspan="2">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::instance('cart')->content() as $item)
                        {{-- {{dd( $item->rowId)}} --}}
                        <tr class="cart_item">
                            <td class="product-thumbnail">
                                <a href="{{route('shop.detail',$item->model->slug)}}">
                                    <img src="{{asset('storage/products/'.$item->model->productImages[0]->path)}}"
                                        alt="{{$item->name}}">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="{{route('shop.detail',$item->model->slug)}}">{{$item->name}}</a>
                                <ul>
                                    <li>Size: {{$item->options->size}}</li>
                                    <li>Color: {{$item->options->color}}</li>
                                </ul>
                            </td>
                            <td class="product-price">
                                <span class="amount">{{$item->price}}VNĐ</span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity buttons_added">
                                    <button type="button" class="plus"
                                        wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">
                                        -
                                    </button>
                                    <button class="input-text qty text">{{$item->qty}}</button>
                                    <button type="button" class="minus"
                                        wire:click.prevent="increaseQuantity('{{$item->rowId}}')">
                                        +
                                    </button>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">${{$item->subtotal}}</span>
                            </td>
                            <td class="product-remove">
                                <a href="#" class="remove" title="Remove this item"
                                    wire:click.prevent="removeItem('{{$item->rowId}}')">
                                    <i class="ui-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mb-30">
                {{-- <div class="col-lg-5">
                    <div class="coupon">
                        <input type="text" name="coupon_code" id="coupon_code" class="input-text" value
                            placeholder="Coupon code">
                        <input type="submit" name="apply_coupon" class="btn btn-md btn-dark btn-button" value="Apply">
                    </div>
                </div> --}}

                <div class="col-lg-12">
                    <div class="actions">
                        {{-- <button type="submit" class="btn btn-md btn-dark btn-button">Update Cart</button> --}}
                        <div class="wc-proceed-to-checkout">
                            <a href="{{route('checkout')}}" class="btn btn-md btn-color btn-button"><span>Thanh
                                    toán</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-lg-6 shipping-calculator-form">
                </div>
                {{-- <h2 class="uppercase mb-30">Calculate Shipping</h2>

                <div class="row row-24">
                    <div class="col-md-6">
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value placeholder="State / county"
                                name="calc_shipping_state" id="calc_shipping_state">
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value placeholder="Postcode"
                                name="calc_shipping_postcode" id="calc_shipping_postcode">
                        </p>
                    </div>
                </div>

                <p>
                    <input type="submit" name="calc_shipping" value="Update Totals"
                        class="btn btn-md btn-dark btn-button">
                </p>
            </div> <!-- end col shipping calculator -->--}}

            <div class="col-lg-4">
                <div class="cart_totals">
                    <h2 class="uppercase mb-20">Tổng giỏ hàng</h2>

                    <table class="table shop_table">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Sản phẩm</th>
                                <td>
                                    <span class="amount">${{Cart::instance('cart')->subtotal()}}</span>
                                </td>
                            </tr>
                            {{-- <tr class="cart-subtotal">
                                <th>Thuế</th>
                                <td>
                                    <span class="amount">${{Cart::tax()}}</span>
                                </td>
                            </tr> --}}
                            <tr class="shipping">
                                <th>Phí vận chuyển</th>
                                <td>
                                    <span>Miễn phí</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Thành tiền</th>
                                <td>
                                    <strong><span class="amount">${{Cart::instance('cart')->total()}}</span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div> <!-- end col cart totals -->

        </div> <!-- end row -->


</div> <!-- end container -->
</section> <!-- end cart -->
@if(session()->has('message'))
<div class="modal" id="messageModal">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 10px 30px">
            <div class="modal-body">
                <i class="mdi mdi-check-circle text-success"></i>
                {{session()->get('message')}}
            </div>
        </div>
    </div>
</div>
@endif
@push('scripts')
<script>
    window.addEventListener('message',event =>{
            $('#messageModal').modal('show');
        });
</script>
@endpush
</div>