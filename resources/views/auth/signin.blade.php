@extends("auth.layout")

@section('content')
    <!--begin::Login Sign in form-->
    <div class="signin">
        <div class="mb-20">
            <h3>@lang("Sign In To Admin")</h3>
            <div class="text-muted font-weight-bold">@lang("Enter your details to login to your account") :</div>
        </div>


        <form class="form" method="post" action="{{route('login')}}" >
            @csrf
            <div class="form-group mb-5">

                <input class="form-control h-auto form-control-solid py-4 px-8"
                       type="text"
                       placeholder="Email"
                       name="email"
                       autocomplete="off"
                />
                @if($errors->has('email'))
                    <div class="text-muted font-weight-bold mt-4">{{$errors->first('email')}}</div>
                @endif
            </div>

            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8"
                       type="password"
                       placeholder="Password"
                       name="password"
                />
                @if($errors->has('password'))
                    <div class="text-muted font-weight-bold mt-4">{{$errors->first('password')}}</div>
                @endif
            </div>

            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <span class="checkbox-inline">


                </span>
                <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">@lang("Forgot your password?")</a>
            </div>
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">@lang("Log in") </button>
        </form>
        <div class="mt-10">
            <span class="opacity-70 mr-4">@lang("Don't have an account yet?")</span>
            <a href="{{route("register")}}"  class="text-muted text-hover-primary font-weight-bold">@lang("Register")</a>
        </div>
    </div>
    <!--end::Login Sign in form-->
@endsection
