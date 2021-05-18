@section('pageName', ' Admin')

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

        .carousel-control-prev-icon-sp {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%25000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon-sp {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%25000' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
        }

    </style>

@endsection

@section('jumb')

    <div class="jumbotron text-light contactJumb text-light">
        <p class="h1 font-weight-bold">Admin Portal</p>
        <p class="lead">Manage Content on this site</p>
    </div>

@endsection

@section('content')

    @include('layouts.adminnav')

    <!-- Modal -->
    <div class="modal fade" id="readSectionModal" tabindex="-1" role="dialog" aria-labelledby="readSectionModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">
                        <h3 id="read-about-title"><i class="las la-info mr-2"></i></h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- stert --}}
                    <p id="read-about-text"></p>
                    {{-- end of card --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <h3><i class="las la-edit mr-2"></i> Edit Announcement</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- stert --}}


                    <form id="edit-public-form" action="" method="post">
                        @csrf
                        @method('post')

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="edit-public-notif-sub">Subject</label>
                            <div class="col-12">
                                <input type="text" maxlength="50" required name="subject" class="form-control"
                                    id="edit-public-notif-sub">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="edit-public-notif-text">Announcement</label>
                            <div class="col-12">
                                <textarea class="form-control" maxlength="600" required name="notification"
                                    id="edit-public-notif-text"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label" for="edit-public-notif-expire">Valid up to:</label>
                            <div class="col-9">
                                <input type="date" min={{ date('Y-m-d', strtotime('+1 days')) }}
                                    max={{ date('Y-m-d', strtotime(' +1 year')) }} class="form-control" required
                                    name="expires-on" id="edit-public-notif-expire">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary px-4 mx-2 btn-sm" type="submit"><i
                                    class="las h5 la-check-double"></i></button>
                            <button class="btn btn-outline-danger px-4 mx-2 btn-sm" type="reset"><i
                                    class="las h5 la-times"></i></button>
                        </div>
                    </form>
                    {{-- end of card --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="editSectionModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <h3><i class="las la-edit mr-2"></i> Edit Section</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- stert --}}

                    <form id="edit-about-title-form" action="" method="post">
                        @csrf
                        @method('post')

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="edit-about-title">Section Title</label>
                            <div class="col-12">
                                <input type="text" maxlength="40" required name="title" class="form-control"
                                    id="edit-about-title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="edit-about-text">Section Text</label>
                            <div class="col-12">
                                <textarea class="form-control" maxlength="2500" rows="15" required name="text"
                                    id="edit-about-text"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary px-4 mx-2 btn-sm" type="submit"><i
                                    class="las h5 la-check-double"></i></button>
                            <button class="btn btn-outline-danger px-4 mx-2 btn-sm"  data-dismiss="modal" type="button"><i
                                    class="las h5 la-times"></i></button>
                        </div>
                    </form>
                    {{-- end of card --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12 text-center">
            <h2><i class="las la-comment-alt h2 mr-3"></i>Announcements</h2>
            <p>Add/Delete/Edit announcements to the public or parents only</p>
        </div>

        @if ($notificationPub->count() > 0)
            <div class="col col-md-6 mb-5" style="min-height: 350px">
                <div class="card mx-auto my-5 rounded-0 text-center h-100 p-0">
                    <h3 class="card-header"><i class="las la-comment-alt mr-2"></i>Public Announcements</h3>

                    <div class="card-body  h-100">

                        <div id="carouselNotice" class="carousel slide h-100" data-ride="carousel">
                            <ol class="carousel-indicators bg-dark">
                                @for ($i = 0; $i < $notificationPub->count(); $i++)
                                    <li data-target="#carouselNotice" data-slide-to={{ $i }} @if ($i == 0) class="active" @endif></li>
                                @endfor
                            </ol>

                            <div class="carousel-inner h-100">
                                @foreach ($notificationPub as $key => $value)
                                    {{ $key }}
                                @endforeach
                                @for ($i = 0; $i < $notificationPub->count(); $i++)
                                    <div @if ($i == 0) class="carousel-item active h-100" @endif
                                        class="carousel-item h-100">
                                        <div class="card h-100 border-0">
                                            <div class="card-body h-100">
                                                <h4 id="edit-pub-sub{{ $i }}" class="card-title ">
                                                    {{ $notificationPub[$i]->subject }}
                                                </h4>
                                                <hr class="w-50">
                                                <p id="edit-pub-msg{{ $i }}" class="card-text text-left">
                                                    {{ $notificationPub[$i]->notification }}
                                                </p>
                                                <hr>
                                                <p>Expires on <span
                                                        id="edit-pub-expire{{ $i }}">{{ $notificationPub[$i]->expire }}</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-center">


                                                <form action="#" method="post">
                                                    <button type="button" id="edit-public-msg"
                                                        class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm"
                                                        data-mes={{ $i }}
                                                        data-id={{ $notificationPub[$i]->id }} data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                        <i class="las h5 la-edit"></i></button>


                                                </form>

                                                <script>

                                                </script>
                                                <form action="adminDeleteAnnouncement/{{ $notificationPub[$i]->id }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button
                                                        class="btn btn-outline-danger border-0 mx-2 px-4 btn-sm delete-confirm"
                                                        type="submit"><i class="las h5 la-trash"></i></button>
                                                </form>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <a class="d-non,e d-md-flex carousel-control-prev " href="#carouselNotice" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon carousel-control-prev-icon-sp"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="d-nopne d-md-flex  carousel-control-next" href="#carouselNotice" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon carousel-control-next-icon-sp"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($notificationPvt->count() > 0)
            <div class="col col-md-6 mb-5" style="min-height: 350px">
                <div class="card mx-auto my-5 rounded-0 text-center h-100 p-0">
                    <h3 class="card-header"><i class="las la-comment-alt mr-2"></i>Parents' Announcements</h3>

                    <div class="card-body  h-100">

                        <div id="carouselNotice" class="carousel slide h-100" data-ride="carousel">
                            <ol class="carousel-indicators bg-dark">
                                @for ($i = 0; $i < $notificationPvt->count(); $i++)
                                    <li data-target="#carouselNotice" data-slide-to={{ $i }} @if ($i == 0) class="active" @endif></li>
                                @endfor
                            </ol>

                            <div class="carousel-inner h-100">
                                @foreach ($notificationPvt as $key => $value)
                                    {{ $key }}
                                @endforeach
                                @for ($i = 0; $i < $notificationPvt->count(); $i++)
                                    <div @if ($i == 0) class="carousel-item active h-100" @endif
                                        class="carousel-item h-100">
                                        <div class="card h-100 border-0">
                                            <div class="card-body h-100">
                                                <h4 id="edit-pvt-sub{{ $i }}" class="card-title ">
                                                    {{ $notificationPvt[$i]->subject }}
                                                </h4>
                                                <hr class="w-50">
                                                <p id="edit-pvt-msg{{ $i }}" class="card-text text-left">
                                                    {{ $notificationPvt[$i]->notification }}
                                                </p>
                                                <hr>
                                                <p>Expires on <span
                                                        id="edit-pvt-expire{{ $i }}">{{ $notificationPvt[$i]->expire }}</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-center">


                                                <form action="#" method="post">
                                                    <button type="button" id="edit-private-msg"
                                                        class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm"
                                                        data-mespvt={{ $i }}
                                                        data-idpvt={{ $notificationPvt[$i]->id }} data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                        <i class="las h5 la-edit"></i></button>

                                                </form>

                                                <script>

                                                </script>
                                                <form action="adminDeleteAnnouncement/{{ $notificationPvt[$i]->id }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button
                                                        class="btn btn-outline-danger border-0 mx-2 px-4 btn-sm delete-confirm"
                                                        type="submit"><i class="las h5 la-trash"></i></button>
                                                </form>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <a class="d-non,e d-md-flex carousel-control-prev " href="#carouselNotice" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon carousel-control-prev-icon-sp"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="d-nopne d-md-flex  carousel-control-next" href="#carouselNotice" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon carousel-control-next-icon-sp"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="col col-md-6 mb-5" style="height: 400px">
            <div class="card mx-auto my-5 rounded-0 text-center h-100">
                <div class="card-header">
                    <h3><i class="las la-comment-medical mr-2"></i> Add Announcement</h3>
                </div>

                <div class="card-body text-left">
                    <form action="admin_add_notification" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="subject">Subject</label>
                            <div class="col-12">
                                <input type="text" maxlength="50" required name="subject" class="form-control" id="subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="notification">Announcement</label>
                            <div class="col-12">
                                <textarea class="form-control" maxlength="600" required name="notification"
                                    id="notification"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label" for="expires-on">Valid up to:</label>
                            <div class="col-9">
                                <input type="date" min={{ date('Y-m-d', strtotime('+1 days')) }}
                                    max={{ date('Y-m-d', strtotime(' +1 year')) }} class="form-control" required
                                    name="expires-on" id="expires-on">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Going to:</label>
                            <div class="col-sm-9">

                                <div class="form-check form-check-inline col-form-label">
                                    <input class="form-check-input" checked type="radio" name="type" id="public"
                                        value="public">
                                    <label class="form-check-label" for="public">Public</label>
                                </div>
                                <div class="form-check form-check-inline col-form-label">
                                    <input class="form-check-input" type="radio" name="type" id="parents" value="parents">
                                    <label class="form-check-label" for="parents">Parents only</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary px-4 mx-2 btn-sm" type="submit"><i
                                    class="las h5 la-check-double"></i></button>
                            <button class="btn btn-outline-danger px-4 mx-2 btn-sm" type="reset"><i
                                    class="las h5 la-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr class="bg-dark mx-auto my-5" style="width: 75%; height: 3px">
    </div>


    <div class="row my-5">
        <div class="col-12 text-center">
            <h2><i class="las la-info h2 mr-3"></i>About us</h2>
            <p>Content here will appear on about us page</p>
        </div>

        <div class="col col-md-6 mb-5" style="min-height: 350px">
            <div class="card">
                <h3 class="card-header"><i class="las la-info mr-2"></i>Current Content</h3>
                <div class="card-body">
                    <div id="carouselAbout" class="carousel slide h-100" data-ride="carousel">
                        <ol class="carousel-indicators bg-dark">
                            @for ($i = 0; $i < $about->count(); $i++)
                                <li data-target="#carouselAbout" data-slide-to={{ $i }} @if ($i == 0) class="active" @endif></li>
                            @endfor
                        </ol>

                        <div class="carousel-inner h-100">

                            @for ($i = 0; $i < $about->count(); $i++)
                                <div @if ($i == 0) class="carousel-item active h-100" @endif
                                    class="carousel-item h-100">
                                    <div class="card h-100 border-0">
                                        <div class="card-body h-100">
                                            <div class="row h4 my-2">
                                                <div class="col-3" id="about-sectionid" data-sectionid={{ $about[$i]->id }}>Title: </div>
                                                <div class="col-9">{{ $about[$i]->title }}</div>
                                            </div>
                                            <hr>
                                            <div class="row h4 my-2">
                                                <div class="col-12">Section Text: </div>
                                                <div class="col-12 h5 my-2">{{ substr($about[$i]->text, 0, 480) }}
                                                    @if (strlen($about[$i]->text) > 480)...
                                                    @endif
                                                </div>
                                                <div class="d-none" id="pass-read-about-text">
                                                    @php
                                                        $text = $about[$i]->text;
                                                        echo htmlspecialchars($text);
                                                    @endphp
                                                </div>
                                                <div class="d-none" id="pass-read-about-title">
                                                    @php
                                                        $title = $about[$i]->title;
                                                        echo htmlspecialchars($title);
                                                    @endphp
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center">


                                            <form action="#" method="post">
                                                <button type="button" id="aboutsection"
                                                    class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm"
                                                    data-toggle="modal" data-target="#readSectionModal">
                                                    <i class="las h5 la-book-open"></i></button>
                                            </form>


                                            <form action="#" method="post">
                                                <button type="button" id="edit-public-msg"
                                                    class="btn btn-outline-primary border-0 mx-2 px-4 btn-sm"
                                                    data-mes={{ $i }} data-id={{ $about[$i]->id }}
                                                    data-toggle="modal" data-target="#editSectionModal">
                                                    <i class="las h5 la-edit"></i></button>
                                            </form>

                                            <form action="adminDeleteAboutSection/{{ $about[$i]->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    class="btn btn-outline-danger border-0 mx-2 px-4 btn-sm delete-confir"
                                                    type="submit"><i class="las h5 la-trash"></i></button>
                                            </form>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <a class="d-non,e d-md-flex carousel-control-prev " href="#carouselAbout" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon carousel-control-prev-icon-sp"
                                aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="d-nopne d-md-flex  carousel-control-next" href="#carouselAbout" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon carousel-control-next-icon-sp"
                                aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>

            </div>
        </div>

        <div class="col col-md-6 mb-5">

            <div class="card h-100">
                <h3 class="card-header"><i class="las la-plus mr-2"></i>Add Content</h3>
                <div class="card-body">

                    <form id="add-section-form" action="addAboutUsContent" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="edit-public-notif-sub">Section Title:</label>
                            <div class="col-sm-9">
                                <input type="text" maxlength="40" required name="title" class="form-control"
                                    id="edit-public-notif-sub">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="edit-public-notif-text">Section Text:</label>
                            <div class="col-12">
                                <textarea class="form-control" style="resize: none" maxlength="2500" rows="10" required
                                    name="text" id="edit-public-notif-text"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary px-4 mx-2 btn-sm" type="submit"><i
                                    class="las h5 la-check-double"></i></button>
                            <button class="btn btn-outline-danger px-4 mx-2 btn-sm" type="reset"><i
                                    class="las h5 la-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <hr class="bg-dark mx-auto my-5" style="width: 75%; height: 3px">
    </div>




    <script>
        // Edit public announcements
        const publiEditModal = document.querySelector('#edit-public-msg');
        const mes = publiEditModal.dataset.mes;
        const id = publiEditModal.dataset.id;
        document.getElementById("edit-public-form").setAttribute("action", "admin_edit_notification/" + id);
        document.getElementById('edit-public-notif-text').value = document.getElementById('edit-pub-msg' + mes).textContent
            .replace(/^\s+|\s+$/g, '');
        document.getElementById('edit-public-notif-sub').value = document.getElementById('edit-pub-sub' + mes).textContent
            .replace(/^\s+|\s+$/g, '');
        document.getElementById('edit-public-notif-expire').value = document.getElementById('edit-pub-expire' + mes)
            .textContent.replace(/^\s+|\s+$/g, '');



        // Edit private announcements
        const privateEditModal = document.querySelector('#edit-private-msg');
        const mespvt = privateEditModal.dataset.mespvt;
        const idpvt = privateEditModal.dataset.idpvt;
        
        document.getElementById("edit-public-form").setAttribute("action", "admin_edit_notification/" + idpvt);
        document.getElementById('edit-public-notif-text').value = document.getElementById('edit-pvt-msg' + mespvt)
            .textContent.replace(/^\s+|\s+$/g, '');
        document.getElementById('edit-public-notif-sub').value = document.getElementById('edit-pvt-sub' + mespvt)
            .textContent.replace(/^\s+|\s+$/g, '');
        document.getElementById('edit-public-notif-expire').value = document.getElementById('edit-pvt-expire' + mespvt)
            .textContent.replace(/^\s+|\s+$/g, '');
            
        document.getElementById('read-about-text').textContent = document.getElementById("pass-read-about-text").textContent.replace(/^\s+|\s+$/g, '');
        document.getElementById('read-about-title').textContent = document.getElementById("pass-read-about-title").textContent.replace(/^\s+|\s+$/g, '');
        const editSecModal = document.querySelector('#about-sectionid');
        const sectionid = editSecModal.dataset.sectionid;
        document.getElementById('edit-about-text').value = document.getElementById("pass-read-about-text").textContent.replace(/^\s+|\s+$/g, '');
        document.getElementById('edit-about-title').value = document.getElementById("pass-read-about-title").textContent.replace(/^\s+|\s+$/g, '');
        document.getElementById("edit-about-title-form").setAttribute("action", "editAboutSection/" + sectionid);




        $('.delete-confir').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Delete this section?",
                    text: "It will be gone forever.",
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


        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Delete this announcement?",
                    text: "It will be gone forever.",
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
