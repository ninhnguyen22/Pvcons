<div id="content-row-53" class="nh-row   ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="item_block" data-action="news/NewsBlock/newsBlock/70" data-method="get">
                    <section id="thi-cong">
                        <div class="block-news construction-service">
                            <h2 class="title-custom">{{ $title }}</h2>
                            <div class="separator"><span> <i class="fa fa-circle"></i> </span></div>
                            <div class="sologan-content">
                                <h2>{{ $description }}</h2>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach($services as $service)
                                        <div class="col-md-4 col-sm-4 col-xs-12  list-item box-blogs">
                                            <div class="item-blogs clearfix">
                                                <div class="info info-custom">
                                                    <h2 class="title-blogs-item">
                                                        <a href="/spa-hb-hai-phong.html">{{ $service->name }}</a>
                                                    </h2>
                                                    <p class="desc-blogs">{{ $service->notify }}</p>
                                                </div>
                                                <div class="img-blogs">
                                                    <a class="img-news" href="/spa-hb-hai-phong.html">
                                                        <img class="lazyload"
                                                             data-src="{{ Storage::disk('admin')->url($service->image) }}"
                                                             src="{{ Storage::disk('admin')->url($service->image) }}">
                                                    </a>
                                                </div>
                                                <div class="link-custom">
                                                    <a href="/spa-hb-hai-phong.html"
                                                       class="btn btn-view-more"> Xem thêm
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
