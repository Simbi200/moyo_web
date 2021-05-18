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



@include('layouts.teachernav')

    <div class="row">

        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Profile</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">View and edit my profile</p>
                    <hr style="width: 50%">
                    <a href="#">Go</a>
                </div>

            </div>

        </div>


        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Enter Results</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">Enter/View students Results</p>
                    <hr style="width: 50%">
                    <a href="/teacher_results" class="">Start</a>
                </div>


            </div>

        </div>

        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Comments From Parents</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">Parents comments on their child's perfomance</p>
                    <hr style="width: 50%">
                    <a href="#" class="">Go</a>
                </div>
                


            </div>

        </div>

        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Internal Announcements</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">view anouncements to staff only</p>
                    <hr style="width: 50%">
                    <a href="#" class="">Go</a>
                </div>
                


            </div>

        </div>

    </div>




@endsection
@include('layouts.dom')
