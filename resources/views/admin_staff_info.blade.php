@section('pageName', 'Student')

@section('content')
    <p class="display-4 text-center py-5 mt-5">Staff Info</p>
    @include('layouts.adminnav')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-0">
                <div class="card-body">

                    <div>

                        <div class="row-col p-2 font-weight-bold text-center h2">
                            <p>
                                <span id="stafffullname">{{ $staff->f_name }} {{ $staff->l_name }}</span>
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
                                    <div class="col-8" id="f_name">{{ $staff->f_name }}</div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Last Name</div>
                                    <div class="col-8" id="l_name">{{ $staff->l_name }}</div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Position</div>
                                    <div class="col-8" id="l_name">{{ $staff->position }}</div>
                                </div>



                                <div class="row py-2">
                                    <div class="col-4 font-weight-bold">Started On</div>
                                    <div class="col-8" id="sjoined">{{ date('d M Y', strtotime($staff->joined_on)) }}
                                    </div>
                                </div>
                                @if ($staff->type != 'admin')
                                    <div class="row py-2">
                                        <div class="col-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">Class</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($staff->subjectsTeacher as $item)
                                                        <tr>
                                                            <td class="py-1">
                                                                {{ $item->subject }}
                                                            </td>
                                                            <td class="py-1 d-flex">
                                                                Form {{ $item->pivot->class }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex  justify-content-center">
                    <form class="mx-2" id="staff_edit" action="/adminEditStaff/{{ $staff->id }}" method="post">
                        @csrf
                        @method('get')
                        {{-- <button type="submit" class="btn btn-outline-dark btn-sm"><i --}}
                        <button type="button" class="btn btn-outline-dark btn-sm"><i
                                class="las la-edit pr-1"></i>Edit</button>
                    </form>
                    <form class="mx-2" id="staff_delete" action="/adminDeleteStaff/{{ $staff->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger btn-sm delete-confirm"><i
                                class="las la-trash pr-1"></i>Remove</button>
                    </form>

                    <script>
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

    </script>

@endsection

@include('layouts.dom')
