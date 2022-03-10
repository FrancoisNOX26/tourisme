@extends('admin.layout')

@section('title')
    {{ config('app.name') }} | @lang('Users') | @lang('Create')
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Card-->
                <div class="card card-custom card-transparent">
                    <div class="card-body p-0">
                        <!--begin::Wizard-->
                        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first"
                             data-wizard-clickable="true">
                            <!--begin::Card-->
                            <div class="card card-custom card-shadowless rounded-top-0">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                        <div class="col-xl-12 col-xxl-10">
                                            <!--begin::Wizard Form-->
                                            <form class="form" id="create_form" method="POST"
                                                  action="{{ route('users.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                    @include('admin.users.form')
                                                    <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                            <div class="mr-2">
                                                            </div>
                                                            <div>
                                                                <button type="submit" id="next-step"
                                                                        class="btn btn-primary font-weight-bolder px-9 py-4"
                                                                        data-wizard-type="action-next">@lang('Save')</button>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Actions-->
                                                    </div>
                                                </div>
                                            </form>
                                            <!--end::Wizard Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Wizard-->
                    </div>
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection


@section('navigation')
    <!--begin::Page Heading-->
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5"><a href="{{route('users.index')}}">@lang('Users Management')</a></h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <div class="text-muted">@lang('New User')</div>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page Heading-->
@endsection


@section('Page Vendors Styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
          type="text/css" />
    <!--end::Page Vendors Styles-->
@endsection


@section('Page Scripts')
    <script type="text/javascript">
        // Interception du Formulaire de connexion
        var form = $('#create_form').get(0)
        $('#create_form').submit(function(e) {
            // Empêcher la soumission de formulaire normale, nous le faisons bien en JS à la place
            e.preventDefault();

            var avatar = ($('input[type=file]')[0].files[0]);

            var formData = new FormData();

            formData.append('_token', $('[name=_token]').val());
            formData.append('avatar', avatar);
            formData.append('name', $('[name=name]').val());
            formData.append('email', $('[name=email]').val());
            formData.append('password', $('[name=password]').val());
            formData.append('password_confirmation', $('[name=password_confirmation]').val());
            formData.append('active', $('[name=active]').val());
            formData.append('roles', $('#roles').val());

            var method = '{!! route('users.store') !!}'

            $.ajax({
                url: method,
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                async: false,
                success: function(data) {
                    window.location.replace(data.redirect);
                },
                error: function(data) {
                    $('.avatar').text('');
                    $('.name').text('');
                    $('.email').text('');
                    $('.password').text('');
                    $('.active').text('');

                    $('#avatar').removeClass('is-invalid');
                    $('#name').removeClass('is-invalid');
                    $('#email').removeClass('is-invalid');
                    $('#password').removeClass('is-invalid');
                    $('#active').removeClass('is-invalid');

                    var errors = $.parseJSON(data.responseText);
                    console.log(errors.errors);
                    $.each(errors.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('.' + key).text(value);
                    });
                }
            });
        });

    </script>
@endsection
