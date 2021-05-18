@section('pageName', 'Staff')

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
        <p class="h1 font-weight-bold">Staff Members Management</p>
    </div>

@endsection


@section('content')

    <div class="modal rounded-0 fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rounded-0" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="adminAddStaff" method="post">
                    <div class="modal-body">

                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="first-name-id">First Name</span>
                            </div>
                            <input type="text" name="f_name" class="form-control" aria-label="first-name"
                                aria-describedby="first-name-id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="last-name-id">Last Name</span>
                            </div>
                            <input type="text" name="l_name" class="form-control" aria-label="last-name"
                                aria-describedby="last-name-id">
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="female" value="F"
                                            checked>
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="male" value="M">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="staff-type-id">Staff Member Type</span>
                                </div>
                                <select class="type-select" name="type" id="staff-type-id" name="type">
                                    <option selected value="Admin">Administration</option>
                                    <option value="admin_teacher">Admin/Academic <small>(e.g. Headmaster)</small></option>
                                    <option value="teacher">Academic Staff</option>
                                    <option value="support">Support Staff</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="last-name-id">Position</span>
                                </div>
                                <input type="text" name="position" class="form-control" aria-label="last-name"
                                    aria-describedby="last-name-id">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="last-name-id">Date Joined Institution</span>
                                </div>
                                <input type="date" name="join" class="form-control" aria-label="last-name"
                                    aria-describedby="last-name-id">
                            </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="las la-times pr-2"></i>Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="las la-check pr-2"></i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal rounded-0 fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rounded-0" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_form" method="post">
                    <div class="modal-body">

                        @csrf
                        @method('patch')

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="first-name-id">First Name</span>
                            </div>
                            <input id="edit_f_name" type="text" name="f_name" class="form-control" aria-label="first-name"
                                aria-describedby="first-name-id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="last-name-id">Last Name</span>
                            </div>
                            <input type="text" id="edit_l_name" name="l_name" class="form-control" aria-label="last-name"
                                aria-describedby="last-name-id">
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="edit_female" value="F"
                                           >
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="edit_male" value="M">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="staff-type-id">Staff Member Type</span>
                                </div>
                                <select class="type-select" name="type" id="staff-type-id">
                                    <option id="opt1" value="admin">Administration</option>
                                    <option id="opt2" value="admin_teacher">Admin/Academic <small>(e.g. Headmaster)</small></option>
                                    <option id="opt3" value="teacher">Academic Staff</option>
                                    <option id="opt4" value="support">Support Staff</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="last-name-id">Position</span>
                                </div>
                                <input type="text" id="edit_position" name="position" class="form-control" aria-label="last-name"
                                    aria-describedby="last-name-id">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="last-name-id">Date Joined Institution</span>
                                </div>
                                <input type="date" id="edit_date" name="join" class="form-control" aria-label="last-name"
                                    aria-describedby="last-name-id">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="last-name-id">Biography</span>
                              </div>
                              <textarea type="text" id="edit_bio" name="bio" class="form-control" aria-label="last-name"
                                  aria-describedby="last-name-id"></textarea>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="las la-times pr-2"></i>Cancel</button>
                        <button onclick="editUserInfo()" type="button" class="btn btn-sm btn-primary"><i class="las la-check pr-2"></i>Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                            {{ csrf_field() }}
                            <div class="col-12">

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Fisrt Name</div>
                                    <div class="col-8" id="f_name"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Last Name</div>
                                    <div class="col-8" id="l_name"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Gender</div>
                                    <div class="col-8" id="sex"></div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Position</div>
                                    <div class="col-8" id="position"></div>
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
                        <button type="button" class="btn btn-outline-secondary btn-sm mx-3" data-dismiss="modal"><i class="las la-times pr-2"></i>Close</button>
                        <button onclick="editUserInfoModal()" class="btn btn-outline-primary btn-sm mx-3"  data-dismiss="modal"><i class="las la-user-edit pr-2"></i>Edit User</button>
                        <form id="user_delete" action="" method="post">
                          @csrf
                          @method('delete')
                          <button onclick="deleteUser()" class="btn btn-outline-danger btn-sm mx-3"  data-dismiss="modal"><i class="las la-trash pr-2"></i>Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card rounded-0">
        <div class="card-header d-flex">
            <h4 class="mr-auto"><i class="las la-users pr-2"></i>All Staff</h4>
            <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"
                data-whatever="Lewis"><i class="las la-user-plus pr-2"></i>Add user</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->f_name }}</td>
                            <td>{{ $user->l_name }}</td>
                            <td>{{ $user->position }}</td>
                            <td>
                                <a onclick="showInfoModal({{ $user }})"><i class="las la-cog pr-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
      var userk ={};

        function deleteUser() {
          let methodx =  "adminDeleteStaff/"+userk.id;
          document.getElementById('user_delete').action = methodx;
          document.getElementById('user_delete').submit();
        
        }

        function editUserInfo() {
          let methodx =  "adminEditStaff/"+userk.id;
          document.getElementById('edit_form').action = methodx;
          document.getElementById('edit_form').submit();
        }

        function editUserInfoModal() {
            let selectId = "";
            let checkedId = "";
            let gender = "";
            
            
            if (userk.sex === "M") {
              checkedId = "edit_male";
            } else if (userk.sex === "F") {
              checkedId = 'edit_female';
            };


            if (userk.type == "admin") {
              selectId = "opt1";
            } else if (userk.type == "admin_teacher"){
              selectId = "opt2";
            } else if (userk.type == "teacher"){
              selectId = "opt3";
            } else if (userk.type == "support"){
              selectId = "opt4";
            };

            document.getElementById('f_name').innerText = userk.f_name + " " + userk.l_name;
            document.getElementById('edit_f_name').value = userk.f_name;
            document.getElementById('edit_l_name').value = userk.l_name;
            // document.getElementById('sdob').innerText = dob.toLocaleDateString("en-GB", opt);
            document.getElementById(checkedId).checked = true;
            // document.getElementById('sex').value = gender;
            document.getElementById(selectId).selected = true;
            document.getElementById('edit_position').value = userk.position;
            document.getElementById('edit_date').value = userk.joined_on;
            document.getElementById('edit_bio').value = userk.bio;
            
            $("#userInfoModal").modal("hide");
            $("#editUserModal").modal("show");


        };
        function showInfoModal(user) {
          userk = user;
            console.log(userk)
            let gender = "";
            let joined_on = new Date(user.joined_on);
            const opt = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            if (user.sex === "M") {
              gender = 'Male'
            } else if (user.sex === "F") {
              gender = 'Female'
            };
            document.getElementById('sfullname').innerText = user.f_name + " " + user.l_name;
            document.getElementById('f_name').innerText = user.f_name;
            document.getElementById('l_name').innerText = user.l_name;
            // document.getElementById('sdob').innerText = dob.toLocaleDateString("en-GB", opt);
            document.getElementById('sex').innerText = gender;
            document.getElementById('position').innerText = user.position;
            document.getElementById('sjoined').innerText = joined_on.toLocaleDateString("en-GB", opt);
            document.getElementById('sbio').innerText = user.bio;


            $("#userInfoModal").modal("show");


        };

    </script>

@endsection

@include('layouts.dom')
