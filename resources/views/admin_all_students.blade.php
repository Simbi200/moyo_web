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




@section('content')
    @include('layouts.adminnav')



    <div class="modal rounded-0 fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog rounded-0" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="adminAddStudent" method="post">
                    <div class="modal-body">

                        @csrf
                        @method('post')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="first-name-id">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" required name="f_name" class="form-control" id="first-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="first-name-id">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" required name="l_name" class="form-control" id="last-name-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="dob-id">Date of Birth</label>
                            <div class="col-sm-10">
                                <input required type="date" name="dob" class="form-control" id="dob-id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="student-class-id">Class</label>
                            <div class="col-sm-10">
                                <select required class="custom-select" name="form" id="student-class-id">
                                    <option selected>Select Student's Class</option>
                                    <option value=1>Form 1</option>
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
                                            <input checked type="checkbox" name="agri" class="form-check-input" value=true
                                                onclick="disableAll()" id="agri-checkbox">
                                            <label class="form-check-label" for="agri-checkbox">Agriculture</label>
                                            <br>
                                            <input checked type="checkbox" name="bio" onclick="disableAll()" value=true
                                                class="form-check-input" id="bio-checkbox">
                                            <label class="form-check-label" for="bio-checkbox">Biology</label>
                                            <br>
                                            <input checked type="checkbox" name="chem" onclick="disableAll()" value=true
                                                class="form-check-input" id="chem-checkbox">
                                            <label class="form-check-label" for="chem-checkbox">Chemistry</label>
                                            <br>
                                            <input checked type="checkbox" name="chic" onclick="disableAll()" value=true
                                                class="form-check-input" id="chic-checkbox">
                                            <label class="form-check-label" for="chic-checkbox">Chichewa</label>
                                            <br>
                                            <input checked type="checkbox" name="comp" onclick="disableAll()" value=true
                                                class="form-check-input" id="comp-checkbox">
                                            <label class="form-check-label" for="comp-checkbox">Computer Studies</label>
                                        </div>
                                        <div class="col-6">
                                            <input checked type="checkbox" name="eng" onclick="disableAll()" value=true
                                                class="form-check-input" id="eng-checkbox">
                                            <label class="form-check-label" for="eng-checkbox">English</label>
                                            <br>
                                            <input checked type="checkbox" name="geog" onclick="disableAll()" value=true
                                                class="form-check-input" id="geog-checkbox">
                                            <label class="form-check-label" for="geog-checkbox">Geography</label>
                                            <br>
                                            <input checked type="checkbox" name="math" onclick="disableAll()" value=true
                                                class="form-check-input" id="math-checkbox">
                                            <label class="form-check-label" for="math-checkbox">Mathematics</label>
                                            <br>
                                            <input checked type="checkbox" name="phy" onclick="disableAll()" value=true
                                                class="form-check-input" id="phy-checkbox">
                                            <label class="form-check-label" for="phy-checkbox">Physics</label>
                                            <br>
                                            <input checked type="checkbox" name="soc" onclick="disableAll()" value=true
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
                                <input type="date" required name="join" class="form-control" id="start-date-id">
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


    {{-- form 1 --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-header d-flex">
                    <h4 class="mr-auto"><i class="las la-students pr-2"></i>Form 1 Students</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"><i
                            class="las la-user-plus pr-2"></i>Add Student</button>
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
                            @foreach ($students as $student)
                                @if ($student->form == 1)
                                    <tr>
                                        <td class="py-1">{{ $student->f_name }} {{ $student->l_name }}</td>
                                        <td class="py-1 d-flex">
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/admin_student_info/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="btn btn-outline-dark border-0 px-1 py-0"><i
                                                        class="las la-info pr-1"></i>Info</button>
                                            </form>
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/adminDeleteStudent/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn delete-confirm btn-outline-danger border-0 px-1 py-0 ml-1"><i
                                                        class="las la-trash pr-1"></i>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-header d-flex">
                    <h4 class="mr-auto"><i class="las la-students pr-2"></i>Form 2 Students</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"><i
                            class="las la-user-plus pr-2"></i>Add Student</button>
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
                            @foreach ($students as $student)
                                @if ($student->form == 2)
                                    <tr>
                                        <td class="py-1">{{ $student->f_name }} {{ $student->l_name }}</td>
                                        <td class="py-1 d-flex">
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/admin_student_info/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="btn btn-outline-dark border-0 px-1 py-0"><i
                                                        class="las la-info pr-1"></i>Info</button>
                                            </form>
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/adminDeleteStudent/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-outline-danger delete-confirm border-0 px-1 py-0 ml-1"><i
                                                        class="las la-trash pr-1"></i>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-header d-flex">
                    <h4 class="mr-auto"><i class="las la-students pr-2"></i>Form 3 Students</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"><i
                            class="las la-user-plus pr-2"></i>Add Student</button>
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
                            @foreach ($students as $student)
                                @if ($student->form == 3)
                                    <tr>
                                        <td class="py-1">{{ $student->f_name }} {{ $student->l_name }}</td>
                                        <td class="py-1 d-flex">
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/admin_student_info/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="btn btn-outline-dark border-0 px-1 py-0"><i
                                                        class="las la-info pr-1"></i>Info</button>
                                            </form>
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/adminDeleteStudent/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-outline-danger delete-confirm border-0 px-1 py-0 ml-1"><i
                                                        class="las la-trash pr-1"></i>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-header d-flex">
                    <h4 class="mr-auto"><i class="las la-students pr-2"></i>Form 4 Students</h4>
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addUserModal"><i
                            class="las la-user-plus pr-2"></i>Add Student</button>
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
                            @foreach ($students as $student)
                                @if ($student->form == 4)
                                    <tr>
                                        <td class="py-1">{{ $student->f_name }} {{ $student->l_name }}</td>
                                        <td class="py-1 d-flex">
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/admin_student_info/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('get')
                                                <button type="submit" class="btn btn-outline-dark border-0 px-1 py-0"><i
                                                        class="las la-info pr-1"></i>Info</button>
                                            </form>
                                            <form class="m-0 p-0 d-flex-inline" id="student_delete"
                                                action="/adminDeleteStudent/{{ $student->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-outline-danger delete-confirm border-0 px-1 py-0 ml-1"><i
                                                        class="las la-trash pr-1"></i>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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


        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Delete this student?",
                    text: "She will be gone forever.",
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
