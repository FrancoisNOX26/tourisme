<?php $r = \Route::current()->getAction() ?>

<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>




<!--begin::Wizard Step 1-->
<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
        <div class="col-lg-9 col-xl-9">
            <div class="image-input image-input-outline" id="kt_user_add_avatar">
                <div class="image-input-wrapper" style="background-image: url(@if ($route == 'sites.create') {{asset('files/avatar/avatar0.png')}} @else {{$site->avatar}}) @endif"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="avatar" id="avatar" class="@error('avatar') is-invalid @enderror" accept=".png, .jpg, .jpeg" value="@if ($route == 'sites.create')
                    {{old('avatar')}}
                    @else
                    {{$site->avatar}}
                    @endif"/>

                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>
            @error('avatar')
            <span class="form-text text-muted" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
            @enderror
            <span class="form-text text-muted" role="alert"><strong class="text-danger avatar" ></strong></span>
        </div>
    </div>
    <!--end::Group-->

    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('Name')</label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-solid form-control-lg
                        @error('name') is-invalid @enderror" name="name" id="name"
                       value="@if($route == 'sites.create'){{old('name')}}@else{{$site->name}}@endif"/>
            </div>
            @error('name')
            <span class="form-text text-muted" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
            @enderror
            <span class="form-text text-muted" role="alert"><strong class="text-danger name" ></strong></span>
        </div>
    </div>
    <!--end::Group-->

    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('Description')</label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <textarea class="form-control form-control-solid form-control-lg
                          @error('description') is-invalid @enderror"
                          cols="60" rows="10"
                          name="description" id="description"
                         >@if($route == 'sites.create'){{old('description')}}@else{{$site->description}}@endif</textarea>
            </div>
            @error('description')
            <span class="form-text text-muted" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
            @enderror
            <span class="form-text text-muted" role="alert"><strong class="text-danger description" ></strong></span>
        </div>
    </div>
    <!--end::Group-->


    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

</div>
<!--end::Wizard Step 1-->
