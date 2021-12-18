@extends('layout')
@section('content')
    <div id="content-row-37" class="nh-row">
        <div class="container">
            <div class="row">

                <x-body.main.category
                    title="Danh Mục Tin Tức"
                    :categories="$categories"
                    :category="$category"/>

                <div class="col-md-9 col-xs-12">
                    <div class="detail-post">
                        <div class="box-detail-post top-post">
                            <h2 class="title-blogs-item"><strong>{{ $product->name }}</strong></h2>
                            <p class="more-blogs"><span class="time"> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $product->updated_at->format('h:i - d/m/Y') }} </span>
                            </p>
                        </div>

                        <div class="short_intro">
                            <p></p>
                            <h5 class="knc-sapo">{{ $product->preview }}</h5>
                            <p></p>
                        </div>

                        @if ($productRelate)
                            <div class="box-detail-post link-lien-quan">
                                <a href="{{ route('news.detail', ['news' => $productRelate->id, 'newsSlug' => Str::slug($productRelate->name)]) }}"
                                   class="item-link-lienquan">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    {{ $productRelate->name }}
                                </a>
                                <br>
                            </div>
                        @endif

                        <div class="ckeditor-post">{!! $product->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
