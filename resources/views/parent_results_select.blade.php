@section('pageName', 'teachers')

@section('css')

@endsection

@section('jumb')

@endsection


@section('content')
    <div class="display-4 my-3 text-center">Results for {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</div>
    @include('layouts.parentnav')

    <div class="card mx-auto my-5 col-md-7 rounded-0 text-center">

        <div class="card-body">

            <p class="card-title">Select exam whose resuls you want to view</p>
            <form action="parent_result" method="post">
                @csrf
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="las la-file pr-2"></i>Exam:
                        </span>
                    </div>
                    <select class="form-control" name="exam" required onchange="this.form.submit()">
                        <option value selected>Select Exam</option>
                        @foreach ($exams as $exam)
                            <option value={{ $exam->id }}>
                                {{ $exam->year }}, Term
                                @if ($exam->type != 4)
                                    {{ $exam->term }}, assessment {{ $exam->type }}
                                @else
                                    {{ $exam->term }}, End of term exams
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('layouts.dom')
