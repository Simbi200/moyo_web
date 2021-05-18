@section('pageName', 'Moyo Academy')

@section('css')
    <style>
        .homeJumb {
            background: black;
            background-image: url('./images/adminBlock2.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 400px;
            border-radius: 0px;
            padding: 100px 30px;
        }

        .carousel-control-prev-icon-sp {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%25000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon-sp {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%25000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
        }

    </style>

@endsection

@section('jumb')

    <div class="text-light homeJumb ">
        <div class="contactJunmb text-light p-2" style="display: flex;
          flex-wrap: wrap;
          align-content: flex-end;">
            <div class="bg-dasrk p-4">
                <h1 class="display-4">Moyo Academy</h1>
                <p class="h5">Education is Power</p>
            </div>
        </div>
    </div>

@endsection

@section('content')



    <div class="row justify-content-center my-5">

        <div class="col-md-6 text-center mb-5" style="height: 350px;">
            <h2>What we offer</h2>
            <div id="carouselWhatWeDo" class="carousel slide h-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselWhatWeDo" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselWhatWeDo" data-slide-to="1"></li>
                    <li data-target="#carouselWhatWeDo" data-slide-to="2"></li>
                    <li data-target="#carouselWhatWeDo" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" style="width: 100%;">
                    <div class="carousel-item h-100 active" style="background-image: url(./images/microscope.jpg);background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;">
                        <div class="carousel-caption d-sm-block d-md-block" style="background-color: rgba(0, 0, 0, 0.6)">                            
                            <p>Fully equiped Science Laboratories... <br> Who said a girl cannot be a scientist?</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" style="background-image: url(./images/whiteboard.png);background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;">
                        <div class="carousel-caption d-sm-block d-md-block" style="background-color: rgba(0, 0, 0, 0.6)">                            
                            <p>Morden Teaching and Learning Materials <br> for effective teaching and learning process</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" style="background-image: url(./images/food.jpg);background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;">
                        <div class="carousel-caption d-sm-block d-md-block" style="background-color: rgba(0, 0, 0, 0.6)">                            
                            <p>Nutritious food for girls good health and perfomance</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" style="background-image: url(./images/ball.jpg);background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;">
                        <div class="carousel-caption d-sm-block d-md-block" style="background-color: rgba(0, 0, 0, 0.6)">                            
                            <p>"All work and no play makes Jack a dull boy"</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselWhatWeDo" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselWhatWeDo" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        @if ($notCount>0)
        <div class="col-md-6 text-center mb-5" style="height: 350px;">
            <h2>Noticeboard</h2>
            <div id="carouselNotice" class="carousel slide h-100" data-ride="carousel">
                <ol class="carousel-indicators bg-dark">
                    @for ($i = 0; $i < $notCount; $i++)
                        <li data-target="#carouselNotice" data-slide-to={{ $i }} @if ($i == 0) class="active" @endif></li>
                    @endfor                    
                </ol>

                <div class="carousel-inner h-100" style="width: 100%;">
                    @for ($i = 0; $i < $notCount; $i++)
                        <div @if ($i == 0) class="carousel-item active  h-100" @endif class="carousel-item  h-100">
                            <div class="card h-100" style="border-radius: 0px;">
                                <div class="card-body">
                                    <h3 class="card-title mt-5 mb-3">{{ $notifications[$i]->subject }}</h3>
                                    <hr class="w-50">
                                    <p class="card-text h4 pt-2 mx-5">{{ $notifications[$i]->notification }}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <a class="d-non,e d-md-flex carousel-control-prev " href="#carouselNotice" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon carousel-control-prev-icon-sp" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="d-nopne d-md-flex  carousel-control-next" href="#carouselNotice" role="button" data-slide="next">
                    <span class="carousel-control-next-icon carousel-control-next-icon-sp" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
            
        @endif

        
    </div>
@endsection

@include('layouts.dom')
