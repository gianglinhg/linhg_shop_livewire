<div>
    <a href="{{Cart::instance('cart')->count() > 0 ? route('cart') : '#'}}">
        <i class="ui-bag"></i>
        ({{Cart::instance('cart')->count()}})
    </a>
    <div class="nav-cart__dropdown">
        <div class="nav-cart__items">
            @foreach(Cart::instance('cart')->content() as $item)
            <div class="nav-cart__item clearfix">
                <div class="nav-cart__img">
                    <a href="{{route('shop.detail',$item->model->slug)}}">
                        <img src="{{asset('storage/products/'.$item->model->productImages[0]->path)}}"
                            alt="{{$item->name}}" width="60px">
                    </a>
                </div>
                <div class="nav-cart__title">
                    <a href="{{route('shop.detail',$item->model->slug)}}">
                        {{$item->name}}
                    </a>
                    <div class="nav-cart__price">
                        <span>1 x</span>
                        <span>{{$item->price}}</span>
                    </div>
                </div>
                <div class="nav-cart__remove">
                    <a href="#" wire:click.prevent="removeItem('{{$item->rowId}}')"><i class="ui-close"></i></a>
                </div>
            </div>
            @endforeach
        </div> <!-- end cart items -->

        @if(Cart::instance('cart')->count() > 0)
        <div class="nav-cart__summary">
            <span>Thành tiền</span>
            <span class="nav-cart__total-price">{{Cart::instance('cart')->subtotal()}}VNĐ</span>
        </div>
        <div class="nav-cart__actions mt-20">
            <a href="{{route('cart')}}" class="btn btn-md btn-light"><span>Giỏ hàng</span></a>
            <a href="{{route('checkout')}}" class="btn btn-md btn-color mt-10"><span>Thanh toán</span></a>
        </div>
        @else
        <div class="nav-cart__summary">
            <span>Giỏ hàng đang trống</span>
        </div>
        @endif
    </div>
</div>