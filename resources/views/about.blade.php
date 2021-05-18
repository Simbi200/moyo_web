@section('pageName', 'About Us')
<style>
         .contactJumb {
            background: black;
            background-image: url('./images/light-bulbs.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            height: 300px;
            border-radius: 0px;
            padding: 100px 30px;
        }
</style>
@section('jumb')
    <div class="jumbotron text-light contactJumb">
        <h1 style="color: #fff" class="h1 font-weight-bold">About Us</h1>
        <p style="color: #fff" class="lead">Know more about us</p>
    </div>

@endsection

@section('content')
    <div>

      @foreach ($about as $item)
      <div class="row justify-content-center my-4">
        <div class="col-md-8">
          <p class="h3 ">{{ ucwords($item->title) }}</p>
          <p >{{ ucwords($item->text) }}</p>
          <hr class="my-4 w-75">
        </div>
      </div>          
      @endforeach

      <div class="row justify-content-center my-3">
        <div class="col-md-8">
          
            <div class="py-3 col-mdd-6 d-nvone">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="/vids/moyoVid.mp4"></iframe>
                </div>
            </div>
        </div>
      </div>





    </div>


@endsection



@include('layouts.dom')
