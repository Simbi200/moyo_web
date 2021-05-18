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

        

    </div>




@endsection
@include('layouts.dom')
