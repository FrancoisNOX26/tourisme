@extends("front.layout")

@section('content')


    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">Listes des sites</h1>
                    <ul>
                        <li><a href="/">Acceuil</a><span class="lnr lnr-arrow-right"></span></li>
                        <li><a href="{{route("allsites")}}">Sites</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->


    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-12">
                           @foreach($sites as $site)
                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <div class="date">
                                        {{$site->created_at->diffForHumans()}}
                                    </div>
                                    <img src="{{$site->avatar}}" alt="">
                                </div>
                                <div class="detail">
                                    <a href="{{route('showsite',['id'=> $site->id ])}}"><h4 class="pb-20">{{$site->name}}</h4></a>
                                    <p>
                                        {{$site->description}}
                                    </p>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>
        <!-- End post Area -->
    </div>
    <!-- End post Area -->
@endsection
