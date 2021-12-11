@if(count($products) > 0)
    @foreach($products as $product)
        <div class="col-md-4 col-sm-4 col-xs-12  list-item box-blogs">
            <div class="border item-blogs clearfix">
                <div class="img-blogs">
                    <a class="img-news" href="/spa-hb-hai-phong.html">
                        <img
                            class="lazyload"
                            data-src="{{ Storage::disk('admin')->url($product->image) }}"
                            src="{{ Storage::disk('admin')->url($product->image) }}">
                    </a>
                </div>
                <div class="info">
                    <h2 class="title-blogs-item">
                        <a href="/spa-hb-hai-phong.html">{{ $product->name }}</a>
                    </h2>
                    <p class="more-blogs">
                        <span class="time">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>{{ $product->updated_at }}
                        </span>
                    </p>
                    <p class="desc-blogs">{{ $product->preview }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center padding-15 no-data"><p>Chưa có dữ liệu</p></div>
@endif
