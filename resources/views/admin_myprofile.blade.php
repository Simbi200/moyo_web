@section('pageName', ' My Profile')

@section('content')

    <div class="display-4 my-3 text-center">My Profile</div>
    @include('layouts.adminnav')

    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center">{{ ucwords(Auth::user()->f_name) }}
                    {{ ucwords(Auth::user()->l_name) }}</h3>
                {{-- <h3 class="card-header text-center">{{ Auth::user() }}</h3> --}}
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 text-right">First Name</div>
                        <div class="col-6">{{ ucwords(Auth::user()->f_name) }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 text-right">Last Name</div>
                        <div class="col-6">{{ ucwords(Auth::user()->l_name) }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 text-right">Username</div>
                        <div class="col-6">{{ Auth::user()->username }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 text-right">Staff Type</div>
                        <div class="col-6">
                            @if (Auth::user()->type == 'admin_teacher')
                                Admin/Teacher
                            @else
                                {{ ucwords(Auth::user()->type) }}
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 text-right">Position</div>
                        <div class="col-6">{{ ucwords(Auth::user()->position) }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6 text-right">Started on</div>
                        <div class="col-6">{{ date('d M, Y', strtotime(Auth::user()->joined_on)) }}</div>
                    </div>
                    @if (Auth::user()->type == 'admin_teacher')
                        <div class="row justify-content-center mt-2">

                            <div class="col-12 col-md-8">

                                <table class="table table-striped h6" style="border: 0px  !important;">
                                    <thead>
                                        <tr>
                                            <th style="border: 0px  !important;" scope="col">
                                                Subject
                                            </th>
                                            <th style="border: 0px  !important;" scope="col">
                                                Form
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->subjectsTeacher as $item)
                                            <tr>
                                                <td style="border: 0px  !important;" scope="row">{{ $item->subject }}
                                                </td>
                                                <td style="border: 0px  !important;" scope="row">
                                                    {{ $item->pivot->class }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    @endif



                    <div class="text-center">
                        <button type="button" id="edit-public-msg"
                            class="btn d-none btn-outline-primary border-0 mx-2 px-4 btn-sm" data-toggle="modal"
                            data-target="#editProfilePasswordModal">
                            <i class="las h5 la-edit"></i> Change Password</button>

                        <button type="button" id="shown" onclick="display_pass()"
                            class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm">
                            <i class="las h5 la-edit"></i> Change Password</button>

                        <button type="button" id="edit-public-msg" class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm"
                            data-toggle="modal" data-target="#editProfileModal">
                            <i class="las h5 la-edit"></i> Edit Profile</button>
                    </div>


                </div>
            </div>
        </div>

        <script>
            function display_pass() {
                document.getElementById("hidden").style.display = "block";
                document.getElementById("shown").style.display = "none";
            }

        </script>




    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-6">


            <div id="hidden" class="card " style="display: none">
                <div class="card-body">
                    <form method="POST" action="changePassword">
                        @csrf

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="editProfilePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="editProfilePasswordModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">
                        <h3 id="read-about-title">Change Password</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="changePassword">
                        @csrf

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- <form id="edit-about-title-form" action="" method="post">
                    @csrf
                    @method('post')

                    <div class="form-group row">
                        <label class="col-12 col-form-label" for="edit-about-title">New Password</label>
                        <div class="col-12">
                            <input type="password" maxlength="40" required name="title" class="form-control"
                                id="edit-about-title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label" for="edit-about-title">Type Password Again</label>
                        <div class="col-12">
                            <input type="text" maxlength="40" required name="title" class="form-control"
                                id="edit-about-title">
                        </div>
                    </div>
                  </form> --}}


                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.dom')
