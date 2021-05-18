@section('pageName', ' Staff')

@section('css')
    <style>
        .contactJumb {
            background: black;
            background-image: url('./images/staff.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 300px;
            border-radius: 0px;
            padding: 100px 30px;
        }

    </style>

@endsection

@section('jumb')

    <div class="jumbotron text-light contactJumb text-light">
        <p class="h1 font-weight-bold" style="color: green">Staff</p>
        <p class="lead" style="color: green">Know more about our staff</p>
    </div>

@endsection


@section('content')



    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="border-radius: 0px; border:0px;">

                <div class="modal-body">
                    <div>

                        <div class="row-col p-2 font-weight-bold text-center h2">
                            <p>
                                <span id="sfullname"> </span>
                                <hr class="bg-success my-0 d-inline-block mx-auto" style="width: 90px; height: 2px">
                            </p>
                        </div>
                        <div class="row pb-5 px-5 ">

                            <div class="col-12" style="background-image: url('/images/contactUs2.jpg'); 
                                                background-repeat: no-repeat; 
                                                background-position: center center; 
                                                background-size: cover;
                                                min-height: 200px
                                                ">
                            </div>

                            <div class="col-12">

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Fisrt Name</div>
                                    <div class="col-8" id="sfirstName"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Last Name</div>
                                    <div class="col-8" id="ssurName"></div>
                                </div>

                                {{-- <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Birth Date</div>
                                    <div class="col-8" id="sdob">{{ date('d M, Y', strtotime(null)) }}</div>
                                </div> --}}

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Gender</div>
                                    <div class="col-8" id="sgender"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Position</div>
                                    <div class="col-8" id="sposition"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Joined On</div>
                                    <div class="col-8" id="sjoined">{{ date('d M Y', strtotime(null)) }}</div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Biography</div>
                                    <div class="col-8"></div>
                                    <div class="row py-2">
                                        <div class="col-2 font-weight-bold"></div>
                                        <div class="col-10" id="sbio"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    
    <div class="pt-3" >

      <h3>
        Adminstration
      </h3>

   

    <div class="row pb-5 pt-2 px-2 ">
        @foreach ($staff as $user)
        @if ($user->type == 'admin' || $user->type == 'admin_teacher')         
        
            <div class="col-6 col-md-3 col-lg-2  col-sm-4 py-2" style="">
                <div class="card bg-0" style="border-radius: 0px; border:0px; background-color:#eee; height: 100%;">
                    <img src="./images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> <span class="font-weight-bold">{{ $user->f_name }} {{ $user->l_name }}</span>
                            <br>{{ $user->position }} <br>
                            <a onclick="showModal({{ $user->id }})"
                                class="btn btn-outline-success btn-sm border-0 card-link">info...
                            </a>
                        </p>
                    </div>
                </div>
            </div>@endif
        @endforeach
    </div>
 </div>
    <div class="pt-3" >

      <h3>
        Academic Staff
      </h3>

   

    <div class="row pb-5 pt-2 px-2 ">
        @foreach ($staff as $user)
        @if ($user->type == 'teacher')   
            <div class="col-6 col-md-3 col-lg-2  col-sm-4 py-2" style="">
                <div class="card bg-0" style="border-radius: 0px; border:0px; background-color:#eee; height: 100%;">
                    <img src="./images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> <span class="font-weight-bold">{{ $user->f_name }} {{ $user->l_name }}</span>
                            <br>{{ $user->position }} <br>
                            <a onclick="showModal({{ $user->id }})"
                                class="btn btn-outline-success btn-sm border-0 card-link">info...
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
 </div>
    <div class="pt-3" >

      <h3>
        Surppot Staff
      </h3>

   

    <div class="row pb-5 pt-2 px-2 ">
        @foreach ($staff as $user)
        @if ($user->type == 'support')  
            <div class="col-6 col-md-3 col-lg-2  col-sm-4 py-2" style="">
                <div class="card bg-0" style="border-radius: 0px; border:0px; background-color:#eee; height: 100%;">
                    <img src="./images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"> <span class="font-weight-bold">{{ $user->f_name }} {{ $user->l_name }}</span>
                            <br>{{ $user->position }} <br>
                            <a onclick="showModal({{ $user->id }})"
                                class="btn btn-outline-success btn-sm border-0 card-link">info...
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
 </div>

    <script>
        function showModal(id) {
            let staff = {};
            axios.get("/api/staffinfo/" + id).then(response => {
                    this.staff = response.data.data;
                    let sex;
                    const opt = {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    };
                    // let dob = new Date(this.staff.dob);
                    let joined_on = new Date(this.staff.joined_on);
                    if (this.staff.sex === 1) {
                        this.sex = 'Male'
                    } else {
                        this.sex = 'Female'
                    }
                    document.getElementById('sfullname').innerText = this.staff.f_name + " " + this.staff.l_name;
                    document.getElementById('sfirstName').innerText = this.staff.f_name;
                    document.getElementById('ssurName').innerText = this.staff.l_name;
                    // document.getElementById('sdob').innerText = dob.toLocaleDateString("en-GB", opt);
                    document.getElementById('sgender').innerText = this.sex;
                    document.getElementById('sposition').innerText = this.staff.position;
                    document.getElementById('sjoined').innerText = joined_on.toLocaleDateString("en-GB", opt);
                    document.getElementById('sbio').innerText = this.staff.bio;
                },
                () => {
                    // if fails
                }

            ).then(
                () => {
                    // console.log(person.l_name);
                    $("#profileModal").modal("show");
                }
            );
        }

    </script>
@endsection

@include('layouts.dom')
