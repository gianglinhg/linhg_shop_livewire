<div>
    <a href="{{Cart::instance('wishlist')->count() > 0 ? route('wishlist') : '#'}}" class="top-bar__item">
        <i class="ui-heart"></i>
        ({{Cart::instance('wishlist')->count()}})
    </a>
    @if(Cart::instance('wishlist')->count() == 0)
    <div class="nav-cart__dropdown">
        <div class="nav-cart__summary">
            <span>Yêu thích đang trống</span>
        </div>
    </div>
    @endif
</div>