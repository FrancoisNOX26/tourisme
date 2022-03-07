@extends("auth.layout")

@section('content')


    <!--begin::Login Sign up form-->
    <div class="signup">
        <div class="mb-20">
            <h3>Sign Up</h3>
            <div class="text-muted font-weight-bold">Enter your details to create your account</div>
        </div>

        <form class="form" method="POST" action="{{route('register')}}">
            @csrf

            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8"
                       type="text"
                       placeholder="Fullname"
                       name="name"
                       value="{{old("name")}}"
                       required
                />
                @if($errors->has('name'))
                    <div class="text-muted font-weight-bold mt-4">{{$errors->first('name')}}</div>
                @endif
            </div>

            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8"
                       type="text"
                       placeholder="Email"
                       name="email"
                       autocomplete="off"
                       value="{{old("email")}}"
                       required
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
                       required
                />
                @if($errors->has('password'))
                    <div class="text-muted font-weight-bold mt-4">{{$errors->first('password')}}</div>
                @endif
            </div>


            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8"
                       type="password"
                       placeholder="Confirm Password"
                       name="password_confirmation"
                       required
                />
            </div>



            <div class="form-group d-flex flex-wrap flex-center mt-10">
                <button  class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Register</button>
                <button  class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
            </div>
        </form>
    </div>
    <!--end::Login Sign up form-->


@endsection
