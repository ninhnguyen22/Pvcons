@extends('layout')
@section('content')
    <div id="content-row-37" class="nh-row">
        <div class="container">
            <div class="row">

                <x-body.main.category
                    title="Danh Mục Tin Tức"
                    :categories="$categories"
                    :category="$category"/>

                <div class="col-sm-9 col-xs-12">
                    <div class="top-list-blogs-subpage clearfix col-xs-12" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-sm-6 no-padding"><h2 class="title-sub-category">{{ $category->name }}</h2>
                            </div>
                            <div class="col-sm-6 no-padding">
                                <div class="clearfix">
                                    <div class="view-style Foatright">
                                        <a href="javascript:void(0)"
                                           data-key-view="list_view_news" data-type="grid"
                                           class="btn-view btn-view-gird active">
                                            <i class="demo-icon icon-th-large-3"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           data-key-view="list_view_news"
                                           data-type="list"
                                           class="btn-view btn-view-list">
                                            <i class="demo-icon icon-th-4"></i> </a>
                                    </div>
                                    <div class="sort-by-product Foatright">
                                        <div class="item-dropdown"><span> Hiển thị </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-list row">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-6 col-sm-6 col-xs-12  list-item box-blogs">
                                    <div class="border item-blogs clearfix">
                                        <div class="img-blogs">
                                            <a class="img-news"
                                               href="{{ route('news.detail', ['news' => $product->id, 'newsSlug' => Str::slug($product->name)]) }}">
                                                <img class="lazyload"
                                                     data-src="{{ Storage::disk('admin')->url($product->image) }}"
                                                     src="{{ Storage::disk('admin')->url($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h2 class="title-blogs-item">
                                                <a href="{{ route('news.detail', ['newsSlug' => Str::slug($product->name), 'news' => $product->id]) }}">{{ $product->name }}</a>
                                            </h2>
                                            <p class="more-blogs">
                                                <span class="time"> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $product->updated_at->format('h:i - d/m/Y') }} </span>
                                            </p>
                                            <p class="desc-blogs">{{ $product->preview }}</p></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
