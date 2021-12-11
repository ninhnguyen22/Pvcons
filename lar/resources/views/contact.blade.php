@extends('layout')
@section('content')
    <div id="content-row-38" class="nh-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="box_module bottom box-contacts">
                        <div class="clearfix">
                            <div class="row">
                                <div class="col-sm-8 col-xs-12">
                                    <div class="box">
                                        <div class="title_style3"><h3>{{ $companyName }}</h3></div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form id="contact-form"
                                                      class="frm-required form-contact margin-t-10" method="POST"
                                                      action="{{ route('contact.store') }}"
                                                      novalidate="novalidate">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input class="form-control "
                                                               type="text" name="name"
                                                               placeholder="Tên"
                                                               aria-required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               type="text" name="phone"
                                                               placeholder="Số điện thoại"
                                                               aria-required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" id="f_email"
                                                               type="text" name="mail"
                                                               placeholder="Email"
                                                               aria-required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea id="content_textarea"
                                                                  name="content"
                                                                  class="form-control required"
                                                                  rows="3" placeholder="Nội dung liên hệ"
                                                                  aria-required="true"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit"
                                                                class="bt btn-default txt-upper btn-submit">
                                                            <span class="name">Gửi liên hệ</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12"><img
                                        src="{{ Storage::disk('admin')->url($companyImg) }}"
                                        class="img-responsive" alt="pic" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box_module box_maps" style="margin-bottom: 50px;">
                        {!! $map !!}
                    </div>
                    <script type="text/javascript">
                        $("#contact-form").validate({
                            rules: {
                                "name": {
                                    required: true,
                                },
                                "phone": {
                                    required: function (element) {
                                        return $("#f_email").val().length <= 0;
                                    },
                                },
                                "title": {
                                    required: true,
                                },
                                "content": {
                                    required: true,
                                },
                                "mail": {
                                    // required: true,
                                    email: true
                                },
                            },
                            messages: {
                                name: {
                                    required: 'Vui lòng nhập tên',
                                },
                                phone: {
                                    required: 'Vui lòng nhập tên số điện thoại hoặc email',
                                },
                                title: {
                                    required: 'Vui lòng nhập tên tiêu đề',
                                },
                                content: {
                                    required: 'Vui lòng nhập nội dung liên hệ',
                                },
                                email: {
                                    required: 'Vui lòng nhập email',
                                    email: 'Email không đúng định dạng',
                                }
                            },
                            showErrors: function (errorMap, errorList) {
                                // Clean up any tooltips for valid elements
                                $.each(this.validElements(), function (index, element) {
                                    nh_functions.showTooltipSuccess(element);
                                });

                                // Create new tooltips for invalid elements
                                $.each(errorList, function (index, error) {
                                    nh_functions.showTooltipError(error.element, error.message);
                                });
                            },
                        });</script>
                </div>
            </div>
        </div>
    </div>
@stop
