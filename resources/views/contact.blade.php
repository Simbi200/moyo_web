@section('pageName', 'Get In Touch')

@section('css')
    <style>
        .myInput {
            padding-left: 10px;
            border-top: none;
            border: none;
            border-bottom: 1px solid #5cb85c;
            width: 100%;
            background: transparent;
            color: #fff;
        }

        .myInput:focus,
        .myInput:hover {
            outline: none !important;
            border-bottom: 1px solid #fff;
        }

        .txtAr {
            resize: none;
        }

        .lab-foc:focus {
            color: #fff;
        }

        .contactJumb {
            background: black;
            background-image: url('./images/contact.png');
            background-repeat: no-repeat;
            background-position: center center;
            height: 300px;
            border-radius: 0px;
            padding: 100px 30px;
        }

    </style>

@endsection

@section('jumb')
    <div class="jumbotron text-light contactJumb text-light">
        <h1 class="h1 font-weight-bold" style="color: black">Get in Touch</h1>
        <p class="lead" style="color: black">We would like to get in touch with you</p>
    </div>

@endsection

@section('content')

    <div class="py-2">
        <div class="row mb-5 pb-5 px-3">
            <div class="col-md-6 px-3 py-4">
                <div>
                    <div>
                        <h1 class="font-weight-bold">Contact Us</h1>
                        <hr class="bg-success mb-2 mt-0 d-inline-block mx-auto" style="width: 200px; height: 2px">
                        <br>
                        <br>
                        <p class="h5">
                            For further information or to arrange an informal visit to the Moyo Academy please contact
                        </p>
                        <p>
                        <ul class="list-unstyled h5">
                            <li class="my-1"><i class="las la-envelope pr-2 py-2"></i>moyoacademy@gmail.com</li>
                            <li class="my-1">
                                <i class="las la-phone pr-2 py-2"></i>
                                <a href="https://wa.me/+265997181866/">
                                    <i class="lab la-whatsapp pr-2 py-2"></i>
                                    +265 (0) 997 18 18 66
                                </a>
                                <small class="ml-4">
                                    Mr M. Namponya (Headmaster)
                                </small>
                            </li>
                            <li class="my-1">
                                <a target="_blank" href="https://www.facebook.com/Moyoacademy.org/">
                                    <i class="lab la-facebook-f pr-2 py-2"></i>
                                    facebook.com/Moyoacademy.org
                                </a>
                            </li>
                            <li id="map" class="my-1">
                                <i class="las la-map-marker-alt pr-2 py-2"></i>
                                Sani, Nkhotakota, Malawi
                            </li>
                        </ul>
                        </p>
                    </div>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9245.
                                534686381208!2d34.303831785517566!3d-13.018566975671938!2m
                                3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x191e304a80c
                                ea1c5%3A0xec918faa19980f81!2zMTPCsDAxJzA5LjkiUyAzNMKwMTgnMzA
                                uNiJF!5e0!3m2!1sen!2smw!4v1614001653672!5m2!1sen!2smw" width="100%" height="250"
                            scrolling="no" frameborder="0" style="border:0;" allowfullscreen="no" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="col-md-6 bg-dark px-3  py-4">
                <div class="row">
                    <p class="mx-3 px-5 h2 text-success py-4">Message us Directly</p>
                </div>
                <form>
                    <div class="form-group row py-2">
                        <label for="name" class="col-3 col-form-label text-success text-right lab-foc">Name</label>
                        <div class="col-8">
                            <input type="text" class="myInput" id="name" placeholder="Full Name">
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="email" class="col-3 col-form-label text-success text-right">Contact</label>
                        <div class="col-8">
                            <input type="text" class="myInput" id="email" placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="inlineRadioOptions" class="col-3 col-form-label text-success text-right">Type</label>
                        <div class="col-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="Comment" checked>
                                <label class="form-check-label text-success px-1" for="inlineRadio1">Comment</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="Question">
                                <label class="form-check-label text-success px-1" for="inlineRadio2">Question</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                    value="Suggestion">
                                <label class="form-check-label text-success px-1" for="inlineRadio3">Suggestion</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row py-2">
                        <label for="subject" class="col-3 col-form-label text-success text-right">Subject</label>
                        <div class="col-8">
                            <input type="text" class="myInput" id="subject" placeholder="Current Project...">
                        </div>
                    </div>



                    <div class="form-group row py-2">
                        <label for="inputPassword" class="col-3 col-form-label text-success text-right">Message</label>
                        <div class="col-8">
                            <textarea class="myInput txtAr" placeholder="Message" id="inputPassword"></textarea>
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center py-3">
                        <button type="submit" class="btn btn-outline-success"><i
                                class="las la-paper-plane pr-2"></i>Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('layouts.dom')
