<div>
    @push('styles')
    <style>
        .btn:hover .mdi {
            color: #fff !important;
        }
    </style>
    @endpush
    @if(session()->has('messageCart'))
    <div class="modal" id="messageModal">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px 30px">
                <div class="modal-body">
                    <i class="mdi mdi-check-circle text-success"></i>
                    {{session()->get('messageCart')}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <section class="section-wrap pb-20 product-single">
        <div class="container">

            <!-- Breadcrumbs -->
            <ol class="breadcrumbs">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <a href="{{route('shop.index')}}">Cửa hàng</a>
                </li>
                <li class="active">
                    {{$product->name}}
                </li>
            </ol>

            <div class="row">

                <div class="col-md-6 product-slider mb-50">

                    <div class="flickity flickity-slider-wrap mfp-hover flickity-enabled is-draggable" id="gallery-main"
                        tabindex="0">
                        <div style="width:28rem;">
                            <img src="{{asset(Storage::url('products/'.$product->productImages[0]->path))}}" alt=""
                                width="80%">
                        </div>
                    </div> <!-- end gallery main -->

                    <div class="gallery-thumbs flickity-enabled is-draggable d-flex" id="gallery-thumbs" tabindex="0">
                        <div class="d-flex">
                            @foreach($product->productImages as $productImage)
                            <img src="{{asset(Storage::url('products/'.$productImage->path))}}" alt="" width="20%">
                            @endforeach
                        </div>

                    </div> <!-- end gallery thumbs -->

                </div> <!-- end col img slider -->

                <div class="col-md-6 product-single">
                    <h1 class="product-single__title uppercase">{{$product->name}}</h1>

                    <div class="rating">
                        <a href="#">3 Reviews</a>
                    </div>

                    <span class="product-single__price">
                        <ins>
                            <span class="amount">{{$product->price}}VNĐ</span>
                        </ins>
                        <del>
                            <span>{{$product->discount ?? "" }}VNĐ</span>
                        </del>
                    </span>
                    {{-- @livewire('client.cart-option-component',['product' => $product]) --}}
                    <!-- Add to cart -->
                    <div class="colors clearfix">
                        <span class="colors__label">Color:
                            {{-- <span class="colors__label-selected">
                                {{$productDetail->color ?? 'Màu'}}
                            </span> --}}
                        </span>
                        @foreach($product->productDetails as $productDetail)
                        @if($productDetail->qty > 0)
                        <a href="#"
                            class="colors__item {{$color == $productDetail->color ? 'colors__item--selected' : ''}}"
                            style="background-color:{{$productDetail->color_code}}"
                            wire:click.prevent="getColorDetail('{{$productDetail->color}}')"></a>
                        @endif
                        @endforeach
                    </div>
                    <div class="size-quantity clearfix">
                        <div class="size">
                            <label>Size</label>
                            <select name="size" id="size__select" class="size__select" wire:model.defer='size'>
                                @if($colorDetails)
                                <option value="0">Vui lòng chọn size</option>
                                @foreach($colorDetails as $colorDetail)
                                <option value="{{$colorDetail->size}}">{{$colorDetail->size}}</option>
                                @endforeach
                                @else
                                <option value="0">Chọn màu để hiện size</option>
                                @endif
                            </select>
                        </div>

                        <div class="quantity">
                            <label>Quantity</label>
                            <input name="quantity" id="quantity__select" class="quantity__select"
                                wire:model.defer='quantity'>
                        </div>
                    </div>

                    <div class="row row-10 product-single__actions clearfix">
                        <div class="col">
                            <a href="#" class="btn btn-lg btn-color product-single__add-to-cart"
                                wire:click.prevent="addToCart">
                                <i class="ui-bag"></i>
                                <span>Add to Cart</span>
                            </a>
                        </div>

                        <div class="col">
                            @php
                            $wiItem = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @if($wiItem->contains($product->id))
                            <a href="#" class="btn btn-lg btn-dark product-single__add-to-wishlist wishlisted"
                                wire:click.prevent="removeFromWishlist({{$product->id}})">
                                <i class="mdi mdi-heart" style="color:#ec2424;"></i>
                                <span>Wishlist</span>
                            </a>
                            @else
                            <a href="#" class="btn btn-lg product-single__add-to-cart"
                                wire:click.prevent="addToWishList({{$product->id}}, '{{$product->name}}', {{$product->price}})">
                                <i class="ui-heart"></i>
                                <span>Wishlist</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <!-- End add to cart -->
                    <div class="product_meta">
                        <ul>
                            <li>
                                <span class="product-code">Product Code: <span>{{$product->sku}}</span></span>
                            </li>
                            <li>
                                <span class="product-material">Material: <span>Cotton 100%</span></span>
                            </li>
                            <li>
                                <span class="product-country">Country: <span>Made in Canada</span></span>
                            </li>
                        </ul>
                    </div>

                    <!-- Accordion -->
                    <div class="accordion mb-50" id="accordion">
                        <div class="accordion__panel">
                            <div class="accordion__heading" id="headingOne">
                                <a data-toggle="collapse" href="#collapseOne" class="accordion__link accordion--is-open"
                                    aria-expanded="true" aria-controls="collapseOne">Description<span
                                        class="accordion__toggle">&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="accordion__body">
                                    {{$product->content}}
                                </div>
                            </div>
                        </div>

                        <div class="accordion__panel">
                            <div class="accordion__heading" id="headingTwo">
                                <a data-toggle="collapse" href="#collapseTwo"
                                    class="accordion__link accordion--is-closed" aria-expanded="false"
                                    aria-controls="collapseTwo">Information<span class="accordion__toggle">&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="accordion__body">
                                    <table class="table shop_attributes">
                                        <tbody>
                                            <tr>
                                                <th>Size:</th>
                                                <td>EU 41 (US 8), EU 42 (US 9), EU 43 (US 10), EU 45 (US 12)</td>
                                            </tr>
                                            <tr>
                                                <th>Colors:</th>
                                                <td>Violet, Black, Blue</td>
                                            </tr>
                                            <tr>
                                                <th>Fabric:</th>
                                                <td>Cotton (100%)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="accordion__panel">
                            <div class="accordion__heading" id="headingThree">
                                <a data-toggle="collapse" href="#collapseThree"
                                    class="accordion__link accordion--is-closed" aria-expanded="false"
                                    aria-controls="collapseThree">Reviews<span class="accordion__toggle">&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion" role="tabpanel"
                                aria-labelledby="headingThree">
                                <div class="accordion__body">
                                    <div class="reviews">
                                        <ul class="reviews__list">
                                            <li class="reviews__list-item">
                                                <div class="reviews__body">
                                                    <div class="reviews__content">
                                                        <p class="reviews__author"><strong>Alexander Samokhin</strong> -
                                                            May 6, 2017 at 12:48 pm</p>
                                                        <div class="rating">
                                                            <a href="#"></a>
                                                        </div>
                                                        <p>This template is so awesome. I didn’t expect so many features
                                                            inside. E-commerce pages are very useful, you can launch
                                                            your
                                                            online store in few seconds. I will rate 5 stars.</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="reviews__list-item">
                                                <div class="reviews__body">
                                                    <div class="reviews__content">
                                                        <p class="reviews__author"><strong>Christopher Robins</strong> -
                                                            May 7, 2014 at 12:48 pm</p>
                                                        <div class="rating">
                                                            <a href="#"></a>
                                                        </div>
                                                        <p>This template is so awesome. I didn’t expect so many features
                                                            inside. E-commerce pages are very useful, you can launch
                                                            your
                                                            online store in few seconds. I will rate 5 stars.</p>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div> <!--  end reviews -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- end accordion -->

                </div> <!-- end col product description -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    {{-- <section class="section-wrap pt-0 pb-40">
    </section> --}}

    <section class="section-wrap pt-0 pb-40">
        <div class="container">

            <div class="heading-row">
                <div class="text-center">
                    <h2 class="heading bottom-line">
                        Sản phẩm cùng loại
                    </h2>
                </div>
            </div>

            <div class="row row-8">
                @foreach($similarProducts as $similarProduct)
                <div class="col-lg-2 col-sm-4 product">
                    <div class="product__img-holder">
                        <a href="single-product.html" class="product__link">
                            <img src="{{ asset(Storage::url('products/'.$similarProduct->productImages[0]->path)) }}"
                                alt="" class="product__img">
                            <img src="{{ asset(Storage::url('products/'.$similarProduct->productImages[1]->path)) }}"
                                alt="" class="product__img-back">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="product__quickview">
                                <i class="ui-eye"></i>
                                <span>Quick Detail</span>
                            </a>
                            @if($wiItem->contains($product->id))
                            <a href="#" class="product__add-to-wishlist wishlisted"
                                wire:click.prevent="removeFromWishlist({{$product->id}})">
                                <i class="mdi mdi-heart"></i>
                                <span>Wishlist</span>
                            </a>
                            @else
                            <a href="#" class="product__add-to-wishlist"
                                wire:click.prevent="addToWishList({{$product->id}}, '{{$product->name}}', {{$product->price}})">
                                <i class="ui-heart"></i>
                                <span>Wishlist</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="product__details">
                        <h3 class="product__title">
                            <a href="single-product.html">{{$similarProduct->name}}</a>
                        </h3>
                    </div>

                    <span class="product__price">
                        <ins>
                            <span class="amount">{{$similarProduct->price}}VNĐ</span>
                        </ins>
                    </span>
                </div> <!-- end product -->
                @endforeach
            </div> <!-- end row -->

            <!-- Comment -->
            <div class="w-75">
                @livewire('client.product-comment-component')
            </div>
        </div> <!-- end container -->
    </section>

    @push('scripts')
    <script>
        window.addEventListener('messageCart',event =>{
            $('#messageModal').modal('show');
        });
        // const
    </script>
    @endpush
</div>