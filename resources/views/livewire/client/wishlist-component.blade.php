<div>
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
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                    </li>
                    <li class="active">
                        Shop
                    </li>
                </ol>

                <div class="row">
                    <div class="col-lg-12 order-lg-2 mb-40">
                        <div class="row row-8">
                            @php
                            $wiItem = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach (Cart::instance('wishlist')->content() as $key => $wishListItem)
                            <div class="col-md-3 col-sm-3 product">
                                <div class="product__img-holder">
                                    <a href="{{route('shop.detail',['slug' => $wishListItem->model->slug])}}"
                                        class="product__link">
                                        <img src="{{asset(Storage::url('products/'.$wishListItem->model->productImages[0]->path))}}"
                                            alt="{{$wishListItem->name}}" class="product__img">
                                        <img src="{{asset(Storage::url('products/'.$wishListItem->model->productImages[1]->path))}}"
                                            alt="{{$wishListItem->name}}" class="product__img-back">
                                    </a>
                                    <div class="product__actions">
                                        <a href="#" wire:click.prevent='quickViewDetail({{$wishListItem->id}})'>
                                            <i class="mdi mdi-information-outline"></i>
                                            <span>Detail</span>
                                        </a>
                                        @if($wiItem->contains($wishListItem->id))
                                        <a href="#" class="product__add-to-wishlist wishlisted"
                                            wire:click.prevent="removeFromWishlist({{$wishListItem->id}})">
                                            <i class="mdi mdi-heart"></i>
                                            <span>Wishlist</span>
                                        </a>
                                        @else
                                        <a href="#" class="product__add-to-wishlist"
                                            wire:click.prevent="addToWishList({{$wishListItem->id}}, '{{$wishListItem->name}}', {{$wishListItem->price}})">
                                            <i class="ui-heart"></i>
                                            <span>Wishlist</span>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="product__details">
                                    <h3 class="product__title">
                                        <a href="#">{{$wishListItem->name}}</a>
                                    </h3>
                                </div>

                                <span class="product__price">
                                    <ins>
                                        <span class="amount">{{$wishListItem->price}}VNĐ</span>
                                    </ins>
                                </span>
                            </div> <!-- end product -->
                            {{-- {{dd($key)}} --}}
                            {{-- @if(($key+1) % 4 == 0)
                            <div class="w-100"></div>
                            @endif --}}
                            @endforeach

                        </div> <!-- end row -->

                        <!-- Pagination -->
                        {{-- <div class="pagination clearfix">
                            {{$wishListItems->links('client-paginate')}}
                        </div> --}}

                    </div> <!-- end col -->

                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
    </div>
</div>