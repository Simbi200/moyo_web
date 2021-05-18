@section('pageName', 'Student')

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
        <p class="h1 font-weight-bold">Edit Students</p>
    </div>

@endsection


@section('content')


    <div class="row justify-content-center">
        <div class="col-lg-8" onload="selectedSubs({{ $user->student_subjects }})">
            <div class="card rounded-0">
                <div class="card-header d-flex text-center">
                    <h4><i class="las la-user-plus pr-2"></i>Edit Student</h4>
                </div>
                <div class="card-body" >

                    <form action="{{ route('studentupdate',$user->id) }}" method="post">

                        @csrf
                        @method('patch')

                        <div class="form-group row" >
                            <label class="col-sm-2 col-form-label" for="first-name-id">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $user->f_name }}" required name="f_name" class="form-control"
                                    id="first-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="first-name-id">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $user->l_name }}" required name="l_name" class="form-control"
                                    id="last-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="dob-id">Date of Birth</label>
                            <div class="col-sm-10">
                                <input required type="date" value="{{ $user->dob }}"  min={{ date('Y-m-d', strtotime('-30 year')) }}
                                max={{ date('Y-m-d', strtotime(' -10 year')) }}  name="dob" class="form-control"
                                    id="dob-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="student-class-id">Class</label>
                            <div class="col-sm-10">
                                <select required class="custom-select" name="form" id="student-class-id" name="type">
                                    <option selected value=1>Form 1</option>
                                    <option value=2>Form 2</option>
                                    <option value=3>Form 3</option>
                                    <option value=4>Form 4</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="student-class-id">Subjects</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-12">
                                            <input checked type="checkbox" class="form-check-input" id="all-checkbox"
                                                onclick="selectAll()">
                                            <label class="form-check-label text-bolder" for="all-checkbox">All
                                                Subjects</label>
                                        </div>
                                        <br>
                                        <div class="col-6">
                                            <input checked type="checkbox" name="agri" class="form-check-input"
                                                onclick="disableAll()" id="agri-checkbox">
                                            <label class="form-check-label" for="agri-checkbox">Agriculture</label>
                                            <br>

                                            <input checked type="checkbox" name="bio" onclick="disableAll()" 
                                                class="form-check-input" id="bio-checkbox">

                                            <label class="form-check-label" for="bio-checkbox">Biology</label>
                                            <br>
                                            <input checked type="checkbox" name="chem" onclick="disableAll()" 
                                                class="form-check-input" id="chem-checkbox">
                                            <label class="form-check-label" for="chem-checkbox">Chemistry</label>
                                            <br>
                                            <input checked type="checkbox" name="chic" onclick="disableAll()" 
                                                class="form-check-input" id="chic-checkbox">
                                            <label class="form-check-label" for="chic-checkbox">Chichewa</label>
                                            <br>
                                            <input checked type="checkbox" name="comp" onclick="disableAll()" 
                                                class="form-check-input" id="comp-checkbox">
                                            <label class="form-check-label" for="comp-checkbox">Computer Studies</label>
                                        </div>
                                        <div class="col-6">
                                            <input checked type="checkbox" name="eng" onclick="disableAll()" 
                                                class="form-check-input" id="eng-checkbox">
                                            <label class="form-check-label" for="eng-checkbox">English</label>
                                            <br>
                                            <input checked type="checkbox" name="geog" onclick="disableAll()" 
                                                class="form-check-input" id="geog-checkbox">
                                            <label class="form-check-label" for="geog-checkbox">Geography</label>
                                            <br>
                                            <input checked type="checkbox" name="math" onclick="disableAll()" 
                                                class="form-check-input" id="math-checkbox">
                                            <label class="form-check-label" for="math-checkbox">Mathematics</label>
                                            <br>
                                            <input checked type="checkbox" name="phy" onclick="disableAll()" 
                                                class="form-check-input" id="phy-checkbox">
                                            <label class="form-check-label" for="phy-checkbox">Physics</label>
                                            <br>
                                            <input checked type="checkbox" name="soc" onclick="disableAll()" 
                                                class="form-check-input" id="soc-checkbox">
                                            <label class="form-check-label" for="soc-checkbox">Social & Development Studies
                                                and Life Skills</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="start-date-id">Date Started</label>
                            <div class="col-sm-10">
                                <input type="date" value="{{ $user->joined_on }}" min={{ date('Y-m-d', strtotime('-20 year')) }} max={{ date('Y-m-d') }} required name="join"
                                    class="form-control" id="start-date-id">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" prevent class="btn btn-sm btn-primary"><i
                                    class="las la-check pr-2"></i>Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
        function disableAll() {
            if (
                document.getElementById('agri-checkbox').checked == true &
                document.getElementById('bio-checkbox').checked == true &
                document.getElementById('chem-checkbox').checked == true &
                document.getElementById('chic-checkbox').checked == true &
                document.getElementById('comp-checkbox').checked == true &
                document.getElementById('geog-checkbox').checked == true &
                document.getElementById('eng-checkbox').checked == true &
                document.getElementById('math-checkbox').checked == true &
                document.getElementById('phy-checkbox').checked == true &
                document.getElementById('soc-checkbox').checked == true) {
                document.getElementById('all-checkbox').checked = true
            } else {
                document.getElementById('all-checkbox').checked = false
            }
        }

        function selectAll() {
            if (document.getElementById('all-checkbox').checked == true) {
                document.getElementById('agri-checkbox').checked =
                    document.getElementById('bio-checkbox').checked =
                    document.getElementById('chem-checkbox').checked =
                    document.getElementById('chic-checkbox').checked =
                    document.getElementById('comp-checkbox').checked =
                    document.getElementById('geog-checkbox').checked =
                    document.getElementById('eng-checkbox').checked =
                    document.getElementById('math-checkbox').checked =
                    document.getElementById('phy-checkbox').checked =
                    document.getElementById('soc-checkbox').checked = true

            } else {
                document.getElementById('agri-checkbox').checked =
                    document.getElementById('bio-checkbox').checked =
                    document.getElementById('chem-checkbox').checked =
                    document.getElementById('chic-checkbox').checked =
                    document.getElementById('comp-checkbox').checked =
                    document.getElementById('geog-checkbox').checked =
                    document.getElementById('eng-checkbox').checked =
                    document.getElementById('math-checkbox').checked =
                    document.getElementById('phy-checkbox').checked =
                    document.getElementById('soc-checkbox').checked = false
            }

        }
        function selectedSubs(subs){
          console.log(subs);
        }
    </script>



    </div>


@endsection

@include('layouts.dom')