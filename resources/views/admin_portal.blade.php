@section('pageName', ' Admin')

@section('css')
    <style>
        .contactJumb {
            background: black;
            background-image: url('/images/adminBlock.jpg');
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
        <p class="h1 font-weight-bold">Admin Portal</p>
        <p class="lead">Manage Content on this site</p>
    </div>

@endsection

@section('content')

@include('layouts.adminnav')



    <div class="row">

        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

              <div class="card-header bg-dark text-white">
                <h5>Staff</h5>
            </div>

            <div class="card-body">
              <p class="card-title">All Staff: {{ $staff_count }}</p>
              <a href="/admin_staff"><button type="button" class="btn btn-sm btn-outline-primary"><i
                class="las la-cog pr-1"></i>Manage Staff</button></a>
              
            </div>

            </div>

        </div>



        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Students</h5>
                </div>

                <div class="card-body">
                  <p class="card-title">All studetns: {{ $student_count }}</p>
                  <a href="/admin_students"><button type="button" class="btn btn-sm btn-outline-primary"><i
                    class="las la-cog pr-1"></i>Manage Students</button></a>
                  
                </div>

            </div>

        </div>


        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Exam Results</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">View Results, Hide/Release them to parents</p>
                    <hr style="width: 50%">
                    <a href="/admin_results" class="">Go</a>
                </div>

            </div>

        </div>


        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Noticeboard</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">Add/Edit/Remove Notifications</p>
                    <hr style="width: 50%">
                    <a href="#" class="">Go</a>
                </div>

            </div>

        </div>

        <div class=" my-3 col-12 col-sm-6 col-md-4">

            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>About Us</h5>
                </div>

                <div class="card-body">
                    <p class="card-title">Add/Delete/Edit Moyo Academy profile</p>
                    <hr style="width: 50%">
                    <a href="#" class="">Go</a>
                </div>

            </div>

        </div>

    </div>




@endsection
@include('layouts.dom')
