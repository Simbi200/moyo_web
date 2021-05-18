@section('pageName', 'Results')

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
        <p class="h1 font-weight-bold">Admin Portal</p>
        <p class="lead">All Students Results</p>
    </div>

@endsection


@section('content')
    <form action="getAllExam" method="get">
        @csrf
        <div class="input-group mb-3 rounded-0">
            <div class="input-group-prepend  rounded-0">
                <label class="input-group-text  rounded-0" for="inputGroupSelect01">Year</label>
            </div>
            <select class="custom-select rounded-0" id="inputGroupSelect01" name="year">
                <option selected value="0">This Year</option>
                <option value="1">Last Year</option>
                <option value="2">2 Years ago</option>
                <option value="3">3 Years ago</option>
            </select>
            <div class="input-group-prepend">
                <label class="input-group-text rounded-0" for="inputGroupSelect01">Term</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="term">
                <option selected value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Exam</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="examtype">
                <option selected value="1">Test 1</option>
                <option value="2">Test 2</option>
                <option value="3">End of Term</option>
            </select>
            <div class="input-group-prepend rounded-0">
                <button type="submit rounded-0 " class="btn btn-outline-secondary">Go</button>
            </div>
        </div>
    </form>

    <hr>

    <div class="card rounded-0">
        <div class="card-header">
            Form 1
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Overall Grade</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>B</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <hr>

    <div class="card rounded-0">
        <div class="card-header">
            Form 2
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Overall Grade</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>B</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>


    <div class="card rounded-0">
        <div class="card-header">
            Form 3
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Overall Grade</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>B</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <div class="card rounded-0">
        <div class="card-header">
            Form 4
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Overall Grade</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>A</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>B</td>
                        <td><i class="las la-info pr-2"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>





@endsection

@include('layouts.dom')
