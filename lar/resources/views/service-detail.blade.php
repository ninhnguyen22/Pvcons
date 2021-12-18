@extends('layout')
@section('content')
    <div id="content-row-37" class="nh-row">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12">
                    <div class="detail-post">
                        <div class="box-detail-post top-post">
                            <h2 class="title-blogs-item"><strong>{{ $service->name }}</strong></h2>
                            <p class="more-blogs"><span class="time"> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $service->updated_at->format('h:i - d/m/Y') }} </span>
                            </p>
                        </div>

                        <div class="short_intro">
                            <p></p>
                            <h5 class="knc-sapo">{{ $service->notify }}</h5>
                            <p></p>
                        </div>

                        <div class="ckeditor-post">{!! $service->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
