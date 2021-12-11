<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($carousels as $carousel)
            <div class="item @if ($loop->first) active @endif">
                <img src="{{ $getStorageUrl($carousel->url) }}" alt="{{ $carousel->caption }}">
                <div class="carousel-caption">
                    {{ $carousel->caption }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="fas fa-chevron-left glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="fas fa-chevron-right glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
