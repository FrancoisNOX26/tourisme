@extends('admin.layout')

@section('title')
    {{ config('app.name') }} | @lang('Roles') | @lang('Create')
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
                                                  action="{{ route('roles.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                    @include('admin.roles.form')
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

@section('Page Scripts')
    <script type="text/javascript">
        // Interception du Formulaire de connexion
        var form = $('#create_form').get(0)
        $('#create_form').submit(function(e) {
            // Empêcher la soumission de formulaire normale, nous le faisons bien en JS à la place
            e.preventDefault();

            var formData = new FormData();

            formData.append('_token', $('[name=_token]').val());
            formData.append('name', $('[name=name]').val());
            formData.append('permissions', $('#permissions').val());

            var method = '{!! route('roles.store') !!}'

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

                    $('.name').text('');

                    $('#name').removeClass('is-invalid');

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
