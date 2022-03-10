@extends("front.layout")

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{asset("img/header-bg.jpg")}}">
        <div class="overlay-bg overlay"></div>
        <div class="container">
            <div class="row fullscreen">
                <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                    <h1>
                        DECOUVRER LES SITES TOURISTIQUES<br>
                        DU DEPARTEMENT DU LOM ET DJEREM.
                    </h1>
                </div>
                <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
{{--                    <div class="col-lg-6 flex-row d-flex meta-left no-padding">--}}
{{--                        <p><span class="lnr lnr-heart"></span> 15 Likes</p>--}}
{{--                        <p><span class="lnr lnr-bubble"></span> 02 Comments</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">--}}
{{--                        <div class="user-meta">--}}
{{--                            <h4 class="text-white">Mark wiens</h4>--}}
{{--                            <p>12 Dec, 2017 11:21 am</p>--}}
{{--                        </div>--}}
{{--                        <img class="img-fluid user-img" src="{{asset("img/user.jpg")}}" alt="">--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start fashion Area -->
    <section class="fashion-area section-gap" id="fashion">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 text-uppercase">Les derniers sites mis en lignes.</h1>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($sites as $key => $site)
                <div class="col-lg-3 col-md-6 single-fashion">
                    <img class="img-fluid" src="{{$site->avatar}}" alt="">
                    <p class="date">{{$site->created_at->diffForHumans()}}</p>
                    <h4><a href="#">{{$site->name}}</a></h4>
                    <p>
                        {{ substr($site->description,0, 100)  }}
                    </p>

                </div>
                @endforeach
                <a href="#" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Voir plus de sites </a>
            </div>
        </div>
    </section>
    <!-- End fashion Area -->

    <!-- Start team Area -->
    <section class="team-area section-gap" id="team">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 text-uppercase">A propos du concepteur.</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-6 team-left">
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that.
                    </p>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women.
                    </p>
                </div>
                <div class="col-lg-6 team-right d-flex justify-content-center">
                    <div class="row active-team-carusel">
                        <div class="single-team">
                            <div class="thumb">
                                <img class="img-fluid" src="{{asset("user1.jpeg")}}" alt="">
                                <div class="align-items-center justify-content-center d-flex">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="meta-text mt-30 text-center">
                                <h4>NGAZOM PRISCA MONIQUE</h4>
                                <p>ENS BERTOUA - Informatique option TIC Niveau 5 </p>
                            </div>
                        </div>
                        <div class="single-team">
                            <div class="thumb">
                                <img class="img-fluid" src="{{asset("user2.jpeg")}}" alt="">
                                <div class="align-items-center justify-content-center d-flex">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="meta-text mt-30 text-center">
                                <h4>NGAZOM PRISCA MONIQUE</h4>
                                <p>ENS BERTOUA - Informatique option TIC Niveau 5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End team Area -->
@endsection
