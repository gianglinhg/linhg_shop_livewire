<div>
    <div class="flex-child nav__search d-none d-lg-block">
        <form method="get" class="nav__search-form">
            <input type="search" class="nav__search-input" placeholder="Tìm kiếm sản phẩm" wire:model='keyword'>
            <button type="submit" class="nav__search-submit">
                <i class="ui-search"></i>
            </button>
        </form>
    </div>
    @if($keyword)
    <div class="query-string d-none d-sm-block" style="position: absolute;">
        <ul>
            @foreach($search_products as $search_product)
            <li>
                <a href="{{route('shop.detail',['slug'=>$search_product->slug])}}">
                    <div class="query-item" style="color: aliceblue">
                        <div class="img">
                            <img src="{{asset('storage/products/'.$search_product->productImages[0]->path)}}"
                                alt="{{$search_product->name}}" width="100%">
                        </div>
                        <div class="item-content">
                            <h6>{{\Str::limit($search_product->name,18)}}</h6>
                            <span>{{$search_product->price}}VNĐ</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
            @if($search_products->count() > 0)
            <li class="all text-right" style="border-top: 1px solid white;">
                <a href="#" class="mr-2">Tất cả</a>
            </li>
            @endif
        </ul>
    </div>
    @endif
</div>