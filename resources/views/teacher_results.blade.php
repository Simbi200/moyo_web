@section('pageName', 'teachers')

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

@endsection


@section('content')
    <div class="h1 my-3 text-center">Enter Exam Results</div>
    @include('layouts.teachernav')



    @foreach ($exams as $exam)
        <div>
            <p class="h4 text-center py-3">
                Enter results for
                @if ($exam->type != 4)
                    term {{ $exam->term }}, assessment no. {{ $exam->type }}
                @else
                    end of term {{ $exam->term }} exams
                @endif

            </p>
        </div>


        @foreach (Auth::user()->subjectsTeacher as $teacherSubject)
            <div class="card m-auto col-md-7 rounded-0 p-0">


                <div class="card-header h5">

                    Form {{ $teacherSubject->pivot->class }} - {{ $teacherSubject->subject }} <small>(
                        @if ($exam->type != 4)
                            term {{ $exam->term }}, assessment no. {{ $exam->type }}
                        @else
                            end of term {{ $exam->term }} exams
                        @endif)
                    </small>

                </div>
                <form class="m-0"
                    action="storeGrade/{{ $teacherSubject->pivot->class }}/{{ $teacherSubject->id }}/{{ $exam->id }}"
                    method="post">
                    @csrf
                    <div class="card-body p-0">



                        <table class="h5 table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Mark</th>
                                    <th scope="col">Remark</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($students as $student)
                                    @foreach ($student->subjects as $studentSubject)

                                        @if ($studentSubject->subject == $teacherSubject->subject && $student->form == $teacherSubject->pivot->class)
                                            <tr>
                                                <td>{{ $student->l_name }} {{ $student->f_name }} </td>

                                                <td>


                                                    <div class="input-group ">
                                                        <input type="number" class="form-control"
                                                            name="{{ $teacherSubject->pivot->class }}-{{ $teacherSubject->id }}-mark{{ $student->id }}"
                                                            min="0" max="100" placeholder="Enter Marks" @foreach ($results as $result)  @if ($result->exam_id==$exam->id &&
                                                            $result->subject_id==$teacherSubject->id &&
                                                            $result->user_id==$student->id)

                                                        value={{ $result->result }}
                                                        @if ($result->result < 50)
                                                            style="color: red;"
                                                        @else
                                                        style="color: blue;"
                                                        @endif @endif
                                        @endforeach>
                    </div>

                    </td>
                    <td>

                        <div class="input-group ">
                            <input type="text" class="form-control"
                                name="{{ $teacherSubject->pivot->class }}-{{ $teacherSubject->id }}-remark{{ $student->id }}"
                                placeholder="Enter Remarks" @foreach ($results as $result)  @if ($result->exam_id==$exam->id &&
                                $result->subject_id==$teacherSubject->id &&
                                $result->user_id==$student->id)

                            value={{ $result->remark }} @endif
        @endforeach>
        </div>
        <div class="input-group d-none">
            <input type="number" class="form-control"
                name="{{ $teacherSubject->pivot->class }}-{{ $teacherSubject->id }}-id{{ $student->id }}"
                value="{{ $student->id }}">
        </div>

        </td>
        </tr>
    @endif
    @endforeach
    @endforeach

    </tbody>


    </table>
    <div class="text-center pb-3"><button class="btn btn-outline-success" type="submit">Done</button>
    </div>


    </div>
    </form>
    </div>
    <br>
    <hr><br>
    @endforeach
    <hr class="my-5" style="border: solid 10px; color: 0.0.0">
    @endforeach



@endsection
@include('layouts.dom')
