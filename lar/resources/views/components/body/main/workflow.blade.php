<div id="content-row-55" class="nh-row  working-process-background "
     style="background-image: url(./assets/images/1564382648-1062993225-custom.jpg) !important;"
>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <section id="quy-trinh">
                    <div class="working-process">
                        <div class="working-process-top"><h2 class="title-custom">{{ $title }}</h2>
                            <div class="separator"><span> <i class="fa fa-circle"></i> </span></div>
                            <div class="sologan-content">
                                <p>{{ $description }}</p>
                            </div>
                        </div>
                        <div class="working-process-bottom">

                            <div class="working-process-list">
                                <ul class="nav nav-pills">
                                    @foreach($workflow as $flow)
                                        <li class="@if ($loop->first) active @endif">
                                            <a data-toggle="pill"
                                               href="#workflow-{{ $flow->id }}">{{ $flow->title }}</a>
                                            <div class="v-border"></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content working-process-content">
                                @foreach($workflow as $flow)
                                    <div id="workflow-{{ $flow->id }}"
                                         class="tab-pane fade in @if ($loop->first) active @endif">
                                        <ul class="item-list">
                                            {!! $getDescription($flow->description) !!}
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
