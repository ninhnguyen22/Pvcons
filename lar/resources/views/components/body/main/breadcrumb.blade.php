@if (count($breadcrumbs) > 0)
    <div id="content-row-17" class="nh-row  no-margin  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="title-main clearfix">
                        <div class="pull-left">
                            <ol class="breadcrumb">
                                @foreach($breadcrumbs as $key => $breadcrumb)
                                    <li class="{{ $active($key) }}">
                                        <a href="{{ $getUrl($breadcrumb->getUrl()) }}"></a>{{ $breadcrumb->getName() }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
