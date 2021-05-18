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
                    <select id="exam" class="form-control" name="exam" required onchange="this.form.submit()">

                        @foreach ($exams as $exam)
                            @if ($exam->id == $curent_exam)
                                <option value={{ $curent_exam }} selected>
                                    {{ $exam->year }}, Term
                                    @if ($exam->type != 4)
                                        {{ $exam->term }}, assessment {{ $exam->type }}
                                    @else
                                        {{ $exam->term }}, End of term exams
                                    @endif
                                </option>
                            @endif
                        @endforeach

                        </option>
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

            <div class="d-flex justify-content-end mb-4">
                {{-- <a class="btn btn-primary" href="{{ URL::to('/results/pdf') }}">Export to PDF</a> --}}
                <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a>
            </div>


            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Mark</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->studentSubjects as $sub)
                        <tr>
                            <td>{{ $sub->subject }}</td>
                            <td>
                                @foreach ($results as $res)
                                    @if ($res->subject_id == $sub->id)
                                        {{ $res->result }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($results as $res)
                                    @if ($res->subject_id == $sub->id)
                                        {{ strtoupper($res->grade) }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($results as $res)
                                    @if ($res->subject_id == $sub->id)
                                        {{ ucfirst($res->remark) }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>

            <div id="chart-row" @for ($i = 0; $i < $results->count(); $i++) @foreach ($user->studentSubjects as $sub_item)
                @if ($results[$i]->subject_id == $sub_item->id)
                    data-subname{{ $i }}={{ $sub_item->subject }}
                    data-subresult{{ $i }}={{ $results[$i]->result }} @endif
                @endforeach
                @endfor
                >
                <div id="chart" style="height: 300px;"></div>
                <script src="/js/chart1.js"></script>
                <script src="/js/chart2.js"></script>
                <!-- Your application script -->
                <script>
                    const chartData = document.querySelector('#chart-row');
                    const subjects = chartData.dataset.subjects;
                    const results = chartData.dataset.results;
                    const resultscount = chartData.dataset.resultscount;
                    const e = document.getElementById('exam');
                    const examname = e.options[e.selectedIndex].text;
                    // console.log(examname)

                    const name = [
                        chartData.dataset.subname0.substr(0, 3),
                        chartData.dataset.subname1.substr(0, 3),
                        chartData.dataset.subname2.substr(0, 3),
                        chartData.dataset.subname3.substr(0, 3),
                        chartData.dataset.subname4.substr(0, 3),
                        chartData.dataset.subname5.substr(0, 3),
                        chartData.dataset.subname6.substr(0, 3),
                        chartData.dataset.subname7.substr(0, 3),
                        chartData.dataset.subname8.substr(0, 3),
                        chartData.dataset.subname9.substr(0, 3),
                    ];

                    const res = [
                        chartData.dataset.subresult0,
                        chartData.dataset.subresult1,
                        chartData.dataset.subresult2,
                        chartData.dataset.subresult3,
                        chartData.dataset.subresult4,
                        chartData.dataset.subresult5,
                        chartData.dataset.subresult6,
                        chartData.dataset.subresult7,
                        chartData.dataset.subresult8,
                        chartData.dataset.subresult9,
                    ];

                    const chart = new Chartisan({
                        el: '#chart',
                        data: {
                            chart: {
                                labels: name,
                            },
                            datasets: [{
                                name: '',
                                values: res,
                            }, ],
                        },

                        hooks: new ChartisanHooks()
                            .colors(['#4299E1'])
                            .legend({
                                position: 'bottom'
                            })
                            .tooltip()
                            .datasets([{
                                type: 'bar',
                                fill: true
                            }, ]),
                    });
                </script>
            </div>
        </div>
    </div>

@endsection
@include('layouts.dom')
