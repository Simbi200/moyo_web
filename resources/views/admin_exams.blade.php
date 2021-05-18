@section('pageName', ' Admin')

@section('content')

    <div class="display-4 my-3 text-center">Exam Management</div>
    @include('layouts.adminnav')
    <div class="row justify-content-center">

        <div class=" my-3 col-12 col-md-6">
            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>All Exams</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Year</th>
                                <th scope="col">Term</th>
                                <th scope="col">Exam</th>
                                <th scope="col">Enter / Release Results </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->year }}</td>
                                    <td>{{ $exam->term }}</td>
                                    <td>
                                        @if ($exam->type == 1)
                                            1st Assessment
                                        @elseif ($exam->type == 2)
                                            2nd Assessment
                                        @elseif ($exam->type == 3)
                                            3rd Assessment
                                        @elseif ($exam->type == 4)
                                            End of term
                                        @endif
                                    </td>
                                    <td>
                                        <form action="admin_releaseExams/{{ $exam->id }}" method="post">
                                            @csrf

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label pr-3">
                                                    <input class="form-check-input" @if (!$exam->release) checked @endif
                                                        value=0 type="radio" name="release" id="open"
                                                        onchange='this.form.submit()'> <i class="las la-edit pr-2"></i>
                                                </label>

                                                <label class="form-check-label">
                                                    <input class="form-check-input" @if ($exam->release) checked @endif
                                                        value=1 type="radio" name="release" id="release"
                                                        onchange='this.form.submit()'> <i
                                                        class="las la-envelope-open pr-2"></i>
                                                </label>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class=" my-3 col-12 col-md-6">
            <div class="card text-center">

                <div class="card-header bg-dark text-white">
                    <h5>Create Exam</h5>
                </div>
                <div class="card-body">
                    <form action="adminCreateExam" method="post">
                        @csrf
                        <div class="input-group my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="las la-calendar pr-2"></i>Academic Year Begining:
                                </span>
                            </div>
                            <select type="number" class="form-control" name="year" required>
                                <option value selected>Select Year </option>
                                <option value={{ date('Y') - 2 }}>{{ date('Y') - 2 }}</option>
                                <option value={{ date('Y') - 1 }}>{{ date('Y') - 1 }}</option>
                                <option value={{ date('Y') }}>{{ date('Y') }}</option>
                                <option value={{ date('Y') + 1 }}>{{ date('Y') + 1 }}</option>
                                <option value={{ date('Y') + 2 }}>{{ date('Y') + 2 }}</option>
                            </select>
                        </div>

                        <div class="input-group my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="las la-calendar pr-2"></i>Term:
                                </span>
                            </div>
                            <select type="text" class="form-control" name="term" required>
                                <option value selected>Select Term</option>
                                <option value=1>One</option>
                                <option value=2>Two</option>
                                <option value=3>Three</option>
                            </select>
                        </div>

                        <div class="input-group my-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="las la-calendar pr-2"></i>Term Exam Type:
                                </span>
                            </div>

                            <select type="text" class="form-control" name="type" required>
                                <option value selected>Select Exam Type</option>
                                <option value=1>Assessment 1</option>
                                <option value=2>Assessment 2</option>
                                <option value=3>Assessment 3</option>
                                <option value=4>End of Term</option>
                            </select>
                        </div>

                        

                        <button class="btn  btn-primary btn-sm px-5" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.dom')
