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
        <p class="h1 font-weight-bold">Add Students</p>
    </div>

@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                {{-- <div class="card-header d-flex text-center">
                    <h4><i class="las la-user-plus pr-2"></i>Add Student</h4>
                </div> --}}
                <div class="card-body">

                    <div>

                        <div class="row-col p-2 font-weight-bold text-center h2">
                            <p>
                                <span id="studentfullname">{{ $student->f_name }} {{ $student->l_name }}</span>
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
                                    <div class="col-8" id="f_name">{{ $student->f_name }}</div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Last Name</div>
                                    <div class="col-8" id="l_name">{{ $student->l_name }}</div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Username</div>
                                    <div class="col-8" id="l_name">{{ $student->username }}</div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Class</div>
                                    <div class="col-8" id="class-form">Form {{ $student->form }}</div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Started On</div>
                                    <div class="col-8" id="sjoined">{{ date('d M Y', strtotime($student->joined_on)) }}
                                    </div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Subjects</div>
                                    <div class="col-8">
                                        @foreach ($subjects as $subject)
                                            {{ $subject->subject }} <br>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex  justify-content-center">
                        <form class="mx-2" id="student_delete" action="/admin_edit_student/{{ $student->id }}"
                            method="post">
                            @csrf
                            @method('get')
                            <button type="submit" class="btn btn-outline-dark btn-sm"><i
                                    class="las la-edit pr-1"></i>Edit</button>
                        </form>
                        <form class="mx-2" id="student_delete" action="/adminDeleteStudent/{{ $student->id }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger delete-confirm btn-sm"><i
                                    class="las la-trash pr-1"></i>Remove</button>
                        </form>
                    </div>
                </div>
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
