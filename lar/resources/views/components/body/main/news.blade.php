<div id="content-row-56" class="nh-row  furniture-background ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="item_block" data-action="news/NewsBlock/newsBlock/72" data-method="get">
                    <div class="block-news news-hot"><h2 class="title-custom">{{ $title }}</h2>
                        <div class="separator"><span> <i class="fa fa-circle"></i> </span></div>
                        <div class="sologan-content"><p>{{ $description }}</p></div>
                        <div class="row">
                            <ul>
                                @foreach($news as $newsItem)
                                    <div class="col-md-4 col-sm-4 col-xs-12  list-item box-blogs">
                                        <div class="border item-blogs clearfix">
                                            <div class="img-blogs">
                                                <a class="img-news" href="/spa-hb-hai-phong.html">
                                                    <img class="lazyload"
                                                         data-src="{{ Storage::disk('admin')->url($newsItem->image) }}"
                                                         src="{{ Storage::disk('admin')->url($newsItem->image) }}">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h2 class="title-blogs-item">
                                                    <a href="/spa-hb-hai-phong.html">{{ $newsItem->title }}</a></h2>
                                                <p class="more-blogs">
                                                    <span class="time">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        {{ $newsItem->updated_at->format('h:i - Y-m-d') }}
                                                    </span>
                                                </p>
                                                <p class="desc-blogs">{{ $newsItem->preview }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
