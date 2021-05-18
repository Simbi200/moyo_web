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
        <p class="h1 font-weight-bold">Students Management</p>
    </div>

@endsection


@section('content')

@include('layouts.adminnav')


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
                        @method('post')

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="first-name-id">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="f_name" class="form-control" id="first-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="last-name-id">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" required name="l_name" class="form-control" id="last-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline col-form-label">
                                    <input class="form-check-input" checked type="radio" name="sex" id="femaleRadio"
                                        value="F">
                                    <label class="form-check-label" for="femaleRadio">Female</label>
                                </div>
                                <div class="form-check form-check-inline col-form-label">
                                    <input class="form-check-input" type="radio" name="sex" id="maleRadio" value="M">
                                    <label class="form-check-label" for="maleRadio">Male</label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="join-id">Start Date</label>
                            <div class="col-sm-8">
                                <input required type="date" name="join" class="form-control" id="join-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="staff-type-id">Staff Type</label>
                            <div class="col-sm-8">
                                <select required class="custom-select" id="staff-type-id" name="type"
                                    onchange="activateTeacher()">
                                    <option selected>Select Staff Type</option>
                                    <option id="admin" value="admin">Admin</option>
                                    <option id="admin_teacher" value="admin_teacher">Admin/Teacher</option>
                                    <option id="teacher" value="teacher">Teacher</option>
                                    <option id="suport" value="suport">Suport Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="position-id">Position</label>
                            <div class="col-sm-8">
                                <input type="text" required name="position" class="form-control" id="position-id">
                            </div>
                        </div>


                        <hr>
                        <p>
                            Section below applies to teachers only
                        </p>

                        <div id="hide" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Form 1</label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f1sub1-id">Subject 1</label>
                                        </div>
                                        <select class="custom-select" id="f1sub1-id" name="f1sub1" disabled>
                                            <option id="none1" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>

                                    <script>
                                    </script>

                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f1sub2-id">Subject 2</label>
                                        </div>
                                        <select class="custom-select" id="f1sub2-id" name="f1sub2" disabled>
                                            <option id="none2" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Form 2</label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f2sub1-id">Subject 1</label>
                                        </div>
                                        <select class="custom-select" id="f2sub1-id" name="f2sub1" disabled>
                                            <option id="none3" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f2sub2-id">Subject 2</label>
                                        </div>
                                        <select class="custom-select" id="f2sub2-id" name="f2sub2" disabled>
                                            <option id="none4" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Form 3</label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f3sub1-id">Subject 1</label>
                                        </div>
                                        <select class="custom-select" id="f3sub1-id" name="f3sub1" disabled>
                                            <option id="none5" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f3sub2-id">Subject 2</label>
                                        </div>
                                        <select class="custom-select" id="f3sub2-id" name="f3sub2" disabled>
                                            <option id="none6" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Form 4</label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f4sub1-id">Subject 1</label>
                                        </div>
                                        <select class="custom-select" id="f4sub1-id" name="f4sub1" disabled>
                                            <option id="none7" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3 row">
                                        <div class="input-group-prepend col-3">
                                            <label class="input-group-text" for="f4sub2-id">Subject 2</label>
                                        </div>
                                        <select class="custom-select" id="f4sub2-id" name="f4sub2" disabled>
                                            <option id="none8" selected>None</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Chichewa">Chichewa</option>
                                            <option value="Computer Studies">Computer Studies</option>
                                            <option value="English">English</option>
                                            <option value="Geography">Geography</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Social & Development Studies and Life Skills">Social Studies &
                                                Life Skills</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" prevent class="btn btn-sm btn-primary"><i
                                    class="las la-check pr-2"></i>Add</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-header d-flex">
                    <h4 class="mr-auto"><i class="las la-students pr-2"></i>All Staff</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"><i
                            class="las la-user-plus pr-2"></i>Add Staff</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $staff)
                                {{-- @if ($staff->form == 1) --}}
                                    <tr>
                                        <td class="py-1">{{ $staff->f_name }} {{ $staff->l_name }}</td>
                                        <td class="py-1 d-flex">
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/admin_staff_info/{{ $staff->id }}" method="post">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="btn btn-outline-dark border-0 px-1 py-0"><i
                                                        class="las la-info pr-1"></i>Info</button>
                                            </form>
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/adminDeleteStaff/{{ $staff->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-outline-danger border-0 delete-confirm px-1 py-0 ml-1"><i
                                                        class="las la-trash pr-1"></i>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var studentk = {};
        var studentId;

        function editStudentInfoModal() {
            let selectId = "";
            let checkedId = "";
            let gender = "";

            document.getElementById('f_name').innerText = studentk.f_name + " " + studentk.l_name;
            document.getElementById('edit_f_name').value = studentk.f_name;
            document.getElementById('edit_l_name').value = studentk.l_name;
            document.getElementById('edit_form').value = studentk.form;
            document.getElementById('edit_date').value = studentk.joined_on;

            $("#studentInfoModal").modal("hide");
            $("#editStudentModal").modal("show");


        };

        function showInfoModal(student) {
            studentId = student;
        };

        function showId() {
            return studentIdt;
        };

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

        function activateTeacher() {
            if (document.getElementById('admin_teacher').selected == true || document.getElementById('teacher').selected == true) {
                document.getElementById('f1sub1-id').disabled = false;
                document.getElementById('f1sub2-id').disabled = false;
                document.getElementById('f2sub1-id').disabled = false;
                document.getElementById('f2sub2-id').disabled = false;
                document.getElementById('f3sub1-id').disabled = false;
                document.getElementById('f3sub2-id').disabled = false;
                document.getElementById('f4sub1-id').disabled = false;
                document.getElementById('f4sub2-id').disabled = false;
                document.getElementById('hide').style.display = 'block';

            } else if (document.getElementById('admin_teacher').selected == false || document.getElementById('teacher').selected == false) {
                document.getElementById('f1sub1-id').disabled = true;
                document.getElementById('f1sub2-id').disabled = true;
                document.getElementById('f2sub1-id').disabled = true;
                document.getElementById('f2sub2-id').disabled = true;
                document.getElementById('f3sub1-id').disabled = true;
                document.getElementById('f3sub2-id').disabled = true;
                document.getElementById('f4sub1-id').disabled = true;
                document.getElementById('f4sub2-id').disabled = true;

                document.getElementById('none1').selected = true;
                document.getElementById('none2').selected = true;
                document.getElementById('none3').selected = true;
                document.getElementById('none4').selected = true;
                document.getElementById('none5').selected = true;
                document.getElementById('none6').selected = true;
                document.getElementById('none7').selected = true;
                document.getElementById('none8').selected = true;
                document.getElementById('hide').style.display = 'none';
            }
        }

        

        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Delete this person?",
                    text: "They will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>

@endsection

@include('layouts.dom')
