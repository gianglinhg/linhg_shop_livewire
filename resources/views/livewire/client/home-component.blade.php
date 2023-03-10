<div>
    @push('styles')
    <style>
        #messageModal {
            position: fixed;
            z-index: 999999;
            top: 16px;
            right: 14px;
        }
    </style>
    @endpush
    @php
    $wiItem = Cart::instance('wishlist')->content()->pluck('id');
    @endphp
    <section class="section-wrap pb-30">
        <div class="container">
            <div class="heading-row">
                <div class="text-center">
                    <h2 class="heading bottom-line" style="font-size: 24px;">
                        Đang bán chạy
                    </h2>
                </div>
            </div>

            <div class="row row-8">
                @foreach ($bestSellers as $item)
                <div class="col-lg-2 col-sm-4 product">
                    <div class="product__img-holder">
                        <a href="{{route('shop.detail',$item->slug)}}" class="product__link" aria-label="Product">
                            <img src="{{asset(Storage::url('products/'.$item->productImages[0]->path))}}"
                                alt="{{$item->name}}" class="product__img">
                            <img src="{{asset(Storage::url('products/'.$item->productImages[1]->path))}}"
                                alt="{{$item->name}}" class="product__img-back">
                        </a>
                        <div class="product__actions">
                            <a href="#" wire:click.prevent='quickViewDetail({{$item->id}})'>
                                <i class="mdi mdi-information-outline"></i>
                                <span>Chi tiết</span>
                            </a>
                            @if($wiItem->contains($item->id))
                            <a href="#" class="product__add-to-wishlist wishlisted"
                                wire:click.prevent="removeFromWishlist({{$item->id}})">
                                <i class="mdi mdi-heart"></i>
                                <span>Yêu thích</span>
                            </a>
                            @else
                            <a href="#" class="product__add-to-wishlist"
                                wire:click.prevent="addToWishList({{$item->id}}, '{{$item->name}}', {{$item->price}})">
                                <i class="ui-heart"></i>
                                <span>Yêu thích</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="product__details">
                        <h3 class="product__title">
                            <a href="{{route('shop.detail',$item->slug)}}">{{ $item->name }}</a>
                        </h3>
                    </div>

                    <span class="product__price">
                        <ins>
                            <span class="amount">{{$item->price}}VNĐ</span>
                        </ins>
                        <del>
                            <span>{{$item->discount ? $item->discount : ''}}VNĐ</span>
                        </del>
                    </span>
                </div> <!-- end product -->
                @endforeach
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end best seller -->

    <!-- New Arrivals -->
    <section class="section-wrap no-padding">
        <div class="container">
            <div class="heading-row">
                <div class="text-center">
                    <h2 class="heading bottom-line" style="font-size: 24px;">
                        sản phẩm mới
                    </h2>
                </div>
            </div>

            <div class="row row-8">
                @foreach ($newArries as $item)
                <div class="col-lg-2 col-sm-4 product">
                    <div class="product__img-holder">
                        <a href="{{route('shop.detail',$item->slug)}}" class="product__link" aria-label="Product">
                            <img src="{{asset(Storage::url('products/'.$item->productImages[0]->path))}}"
                                alt="{{$item->name}}" class="product__img">
                            <img src="{{asset(Storage::url('products/'.$item->productImages[1]->path))}}"
                                alt="{{$item->name}}" class="product__img-back">
                        </a>
                        <div class="product__actions">
                            <a href="#" wire:click.prevent='quickViewDetail({{$item->id}})'>
                                <i class="mdi mdi-information-outline"></i>
                                <span>Detail</span>
                            </a>
                            @if($wiItem->contains($item->id))
                            <a href="#" class="product__add-to-wishlist wishlisted"
                                wire:click.prevent="removeFromWishlist({{$item->id}})">
                                <i class="mdi mdi-heart"></i>
                                <span>Wishlist</span>
                            </a>
                            @else
                            <a href="#" class="product__add-to-wishlist"
                                wire:click.prevent="addToWishList({{$item->id}}, '{{$item->name}}', {{$item->price}})">
                                <i class="ui-heart"></i>
                                <span>Wishlist</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="product__details">
                        <h3 class="product__title">
                            <a href="{{route('shop.detail',$item->slug)}}">{{ $item->name }}</a>
                        </h3>
                    </div>

                    <span class="product__price">
                        <ins>
                            <span class="amount">{{$item->price}}VNĐ</span>
                        </ins>
                        <del>
                            <span>{{$item->discount ? $item->discount : ''}}VNĐ</span>
                        </del>
                    </span>
                </div> <!-- end product -->
                @endforeach
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end new arrivals -->
    <!-- Model product chi tiết trang chủ -->
    @if($productDetail)
    <div class="modal fade bd-example-modal-lg" id="quick_detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-0 m-0">
                <div class="modal-body">
                    <div class="" style="font-size:18px">
                        <div class="row">

                            <div class="col-md-6 product-slider">

                                <div class="flickity flickity-slider-wrap mfp-hover flickity-enabled is-draggable"
                                    id="gallery-main" tabindex="0">
                                    <div>
                                        <img src="{{asset(Storage::url('products/'.$productDetail->productImages[0]->path))}}"
                                            alt="">
                                    </div>
                                </div> <!-- end gallery main -->

                                <div class="gallery-thumbs flickity-enabled is-draggable d-flex" id="gallery-thumbs"
                                    tabindex="0">
                                    <div class="d-flex" style="gap: 4px">
                                        <?php
                                        $countImages = $productDetail->productImages->count();

                                        foreach($productDetail->productImages as $productImage){ ?>
                                        <img src="{{asset(Storage::url('products/'.$productImage->path))}}"
                                            style="width: calc((100%/{{$countImages}}) - 4px)">
                                        <?php } ?>
                                    </div>

                                </div> <!-- end gallery thumbs -->

                            </div> <!-- end col img slider -->

                            <div class="col-md-6 product-single">
                                <h1 class="product-single__title uppercase">{{$productDetail->name}}</h1>

                                <div class="rating">
                                    <a href="#">3 Reviews</a>
                                </div>

                                <span class="product-single__price">
                                    <ins>
                                        <span class="amount">{{$productDetail->price}}VNĐ</span>
                                    </ins>
                                    <del>
                                        <span>{{$productDetail->discount ?? "" }}VNĐ</span>
                                    </del>
                                </span>
                                <!-- Add to cart -->
                                {{-- @livewire('client.cart-option-component',['product' => $product]) --}}

                                <div class="product_meta">
                                    <ul>
                                        <li>
                                            <span class="product-code">Product Code:
                                                <span>{{$productDetail->sku}}</span></span>
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
                                            <a data-toggle="collapse" href="#collapseOne"
                                                class="accordion__link accordion--is-open" aria-expanded="true"
                                                aria-controls="collapseOne">Description<span
                                                    class="accordion__toggle">&nbsp;</span>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion"
                                            role="tabpanel" aria-labelledby="headingOne">
                                            <div class="accordion__body">
                                                {{$productDetail->content}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion__panel">
                                        <div class="accordion__heading" id="headingTwo">
                                            <a data-toggle="collapse" href="#collapseTwo"
                                                class="accordion__link accordion--is-closed" aria-expanded="false"
                                                aria-controls="collapseTwo">Information<span
                                                    class="accordion__toggle">&nbsp;</span>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion" role="tabpanel"
                                            aria-labelledby="headingTwo">
                                            <div class="accordion__body">
                                                <table class="table shop_attributes">
                                                    <tbody>
                                                        <tr>
                                                            <th>Size:</th>
                                                            <td>EU 41 (US 8), EU 42 (US 9), EU 43 (US 10), EU 45 (US 12)
                                                            </td>
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
                                                aria-controls="collapseThree">Reviews<span
                                                    class="accordion__toggle">&nbsp;</span>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion"
                                            role="tabpanel" aria-labelledby="headingThree">
                                            <div class="accordion__body">
                                                <div class="reviews">
                                                    <ul class="reviews__list">
                                                        <li class="reviews__list-item">
                                                            <div class="reviews__body">
                                                                <div class="reviews__content">
                                                                    <p class="reviews__author"><strong>Alexander
                                                                            Samokhin</strong> -
                                                                        May 6, 2017 at 12:48 pm</p>
                                                                    <div class="rating">
                                                                        <a href="#"></a>
                                                                    </div>
                                                                    <p>This template is so awesome. I didn’t expect so
                                                                        many features
                                                                        inside. E-commerce pages are very useful, you
                                                                        can launch
                                                                        your
                                                                        online store in few seconds. I will rate 5
                                                                        stars.</p>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="reviews__list-item">
                                                            <div class="reviews__body">
                                                                <div class="reviews__content">
                                                                    <p class="reviews__author"><strong>Christopher
                                                                            Robins</strong> -
                                                                        May 7, 2014 at 12:48 pm</p>
                                                                    <div class="rating">
                                                                        <a href="#"></a>
                                                                    </div>
                                                                    <p>This template is so awesome. I didn’t expect so
                                                                        many features
                                                                        inside. E-commerce pages are very useful, you
                                                                        can launch
                                                                        your
                                                                        online store in few seconds. I will rate 5
                                                                        stars.</p>
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
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button class="btn btn-primary w-xs m-2">Close</button>
                </div> --}}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('message'))
    <div class="" id="messageModal">
        <div class="">
            <div class="modal-content">
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
        window.addEventListener('show-quickDetail',event =>{
                $('#quick_detail').modal('show');
            });
        window.addEventListener('show-message',event =>{
                $('#messageModal').modal('show');
            });
    </script>
    @endpush
</div>