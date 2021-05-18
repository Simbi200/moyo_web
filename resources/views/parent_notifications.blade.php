@section('pageName', ' Teacchers')

@section('css')
    <style>
        .contactJumb {
            background: black;
            background-image: url('./images/adminBlock.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 200px;
            border-radius: 0px;
            padding: 100px 30px;
        }

    </style>

@endsection

@section('jumb')

    <div class="jumbotron text-light contactJumb text-light">
        <p class="h1 font-weight-bold">Teacher Portal</p>
        <p class="lead">Manage Content on this site</p>
    </div>

@endsection

@section('content')
    <div class="display-4 my-3 text-center">Enter Exam Results</div>
    @include('layouts.parentnav')



    <div class="row">

      <div class="col col-md-6">
        <div class="card mx-auto my-5  rounded-0 text-center">
            <div class="card-header">
                <h2>Announcements</h2>
            </div>

            @foreach ($notifications as $notification)
                <div class="card-body text-left">
                    <div class="card-title h4">{{ $notification->subject }}</div>
                    <p>
                        {{ $notification->notification }}
                    </p>

                </div>
                {{-- <div class="d-flex justify-content-center">
                    <form action="" method="post">
                      @csrf
                        <button class="btn btn-primary mx-2 px-5" type="submit">Edit</button>
                    </form>
                    <form action="" method="post">
                      @csrf
                        <button class="btn btn-danger mx-2 px-5" type="submit">Delete</button>
                    </form>
                </div> --}}


                <hr class="mx-auto" style="width: 70%;">

            @endforeach



        </div>

    </div>

    </div>




@endsection
@include('layouts.dom')
