<div>
    @push('head')
    <style>
        .widget .active1 {
            color: rgb(203, 15, 15);
        }

        .wishlisted i {
            color: rgb(203, 15, 15) !important;
        }

        /* .widget li a {
        color: white !important;
    } */
    </style>
    @endpush
    <section class="section-wrap pt-60 pb-30 catalog">
        <div class="container">

            <!-- Breadcrumbs -->
            <ol class="breadcrumbs">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li class="active">
                    Cửa hàng
                </li>
            </ol>

            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-40">

                    <!-- Filter -->
                    <div class="shop-filter">
                        <p class="woocommerce-result-count" style="color:#333 !important;">
                            Đang hiện: <span>{{ $products->firstItem() }}</span>
                            - <span>{{ $products->lastItem() }}</span> của
                            <span>{{$products->count()}}</span> sản phẩm
                        </p>
                        <span class="woocommerce-ordering-label">Sắp xếp theo</span>
                        <form class="woocommerce-ordering">
                            <select wire:model='sort'>
                                <option value="default-sorting">Mặc định</option>
                                <option value="price-low-to-high">Giá: tăng dần</option>
                                <option value="price-high-to-low">Giá: giảm dần</option>
                                {{-- <option value="by-popularity">By Popularity</option>
                                <option value="date">By Newness</option>
                                <option value="rating">By Rating</option> --}}
                            </select>
                        </form>
                    </div>

                    <div class="row row-8">
                        @php
                        $wiItem = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach ($products as $key => $product)
                        <div class="col-md col-sm-6 product">
                            <div class="product__img-holder">
                                <a href="{{route('shop.detail',['slug' => $product->slug])}}" class="product__link">
                                    <img src="{{asset(Storage::url('products/'.$product->productImages[0]->path))}}"
                                        alt="{{$product->name}}" class="product__img">
                                    <img src="{{asset(Storage::url('products/'.$product->productImages[1]->path))}}"
                                        alt="{{$product->name}}" class="product__img-back">
                                </a>
                                <div class="product__actions">
                                    <a href="#" wire:click.prevent='quickViewDetail({{$product->id}})'>
                                        <i class="mdi mdi-information-outline"></i>
                                        <span>Chi tiết</span>
                                    </a>
                                    @if($wiItem->contains($product->id))
                                    <a href="#" class="product__add-to-wishlist wishlisted"
                                        wire:click.prevent="removeFromWishlist({{$product->id}})">
                                        <i class="mdi mdi-heart"></i>
                                        <span>Yêu thích</span>
                                    </a>
                                    @else
                                    <a href="#" class="product__add-to-wishlist"
                                        wire:click.prevent="addToWishList({{$product->id}}, '{{$product->name}}', {{$product->price}})">
                                        <i class="ui-heart"></i>
                                        <span>Yêu thích</span>
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="product__details">
                                <h3 class="product__title">
                                    <a href="#">{{$product->name}}</a>
                                </h3>
                            </div>

                            <span class="product__price">
                                <ins>
                                    <span class="amount">{{$product->price}}VNĐ</span>
                                </ins>
                            </span>
                        </div> <!-- end product -->
                        @if(($key+1) % 4 == 0)
                        <div class="w-100"></div>
                        @endif
                        @endforeach

                    </div> <!-- end row -->

                    <!-- Pagination -->
                    <div class="pagination clearfix">
                        {{$products->links('client-paginate')}}
                    </div>

                </div> <!-- end col -->


                <!-- Sidebar -->
                <aside class="col-lg-3 sidebar left-sidebar">

                    <!-- Categories -->
                    <div class="widget widget_categories widget--bottom-line">
                        <h4 class="widget-title">Danh mục</h4>
                        <ul>
                            <li>
                                <a href="{{url('shop?for=women')}}">Nữ</a>
                            </li>
                            <li class="active">
                                <a href="{{url('shop?for=men')}}">Nam</a>
                            </li>
                            {{-- <li>
                                <a href="#">Accessories</a>
                            </li>
                            <li>
                                <a href="#">Bags</a>
                            </li>
                            <li>
                                <a href="#">Watches</a>
                            </li>
                            <li>
                                <a href="#">Shoes</a>
                            </li> --}}
                        </ul>
                    </div>

                    <!-- Size -->
                    <div class="widget widget__filter-by-size widget--bottom-line">
                        <h4 class="widget-title">Size</h4>
                        <ul class="size-select">
                            <li>
                                <input type="checkbox" class="checkbox" id="small-size" name="small-size">
                                <label for="small-size" class="checkbox-label">X-Small</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="medium-size" name="medium-size">
                                <label for="medium-size" class="checkbox-label">Small</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="large-size" name="large-size">
                                <label for="large-size" class="checkbox-label">Medium</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="xlarge-size" name="xlarge-size">
                                <label for="xlarge-size" class="checkbox-label">Large</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="xxlarge-size" name="xxlarge-size">
                                <label for="xxlarge-size" class="checkbox-label">X-Large</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Color -->
                    <div class="widget widget__filter-by-color widget--bottom-line">
                        <h4 class="widget-title">Màu</h4>
                        <ul class="color-select">
                            <li>
                                <input type="checkbox" class="checkbox" id="green-color" name="green-color">
                                <label for="green-color" class="checkbox-label">Green</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="red-color" name="red-color">
                                <label for="red-color" class="checkbox-label">Red</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="blue-color" name="blue-color">
                                <label for="blue-color" class="checkbox-label">Blue</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="white-color" name="white-color">
                                <label for="white-color" class="checkbox-label">White</label>
                            </li>
                            <li>
                                <input type="checkbox" class="checkbox" id="black-color" name="black-color">
                                <label for="black-color" class="checkbox-label">Black</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Filter by Price -->
                    <div class="widget widget__filter-by-price widget--bottom-line">
                        <h4 class="widget-title">Filter by Price</h4>

                        <div id="slider-range"
                            class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                style="left: 10.6667%; width: 0%;">
                            </div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                style="left: 10.6667%;"></span><span
                                class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                style="left: 10.6667%;"></span>
                        </div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount">
                            <a href="#" class="btn btn-sm btn-dark"><span>Filter</span></a>
                        </p>
                    </div>

                </aside> <!-- end sidebar -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    @if($productDetail)
    <div class="modal fade bd-example-modal-lg" id="quick_detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <div class="p-0 m-0" style="font-size:18px">
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
        window.addEventListener('show-quickDetail',event =>{
                $('#quick_detail').modal('show');
            });
        window.addEventListener('message',event =>{
            $('#messageModal').modal('show');
        });
    </script>
    @endpush
</div>