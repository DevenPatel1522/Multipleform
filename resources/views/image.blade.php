<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title></title>
    <style>
        .error {
            color: red;
        }

        .note {
            text-align: center;
            height: 100px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            line-height: 1.8em;
            text-transform: none;
            letter-spacing: .075em;
            font-weight: bold;
            font-style: normal;
            text-decoration: none;
            /* color: #e7bd74; */
            background-color: rgb(225, 236, 235);
            display: block;
        }

        .title {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 30%;
            height: 50px;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
            font-size: 20px;
            /* margin-left: 800px; */

        }

        .next {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 30%;
            height: 50px;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
            font-size: 20px;
            margin-left: 335px;

        }

        h1 {
            font-family: sans-serif;
            display: block;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            letter-spacing: 3px;
            color: hotpink;
            text-transform: uppercase;
            padding-top: 35px;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            text-decoration: none;
            color: #fff;
        }



        .container {
            width: 100%;
            margin-top: 30px;
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style: none;
            display: inline-block;
            width: 20.33%;
            position: relative;
            text-align: center;
            cursor: pointer;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 1px solid #ddd;
            border-radius: 100%;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            background-color: #fff;
        }

        .progressbar li:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #ddd;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .progressbar li.active {
            color: green;
        }

        .progressbar li.active:before {
            border-color: green;
        }

        .progressbar li.active+li:after {
            background-color: green;
        }

        .progressbar {
            text-align: center;
        }

        .photo {
            font-size: 20px;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 200px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
            max-height: 1000px !important;
        }
    </style>
</head>

<body>



    <div class="container">
        <ul class="progressbar">
            <li class="active">Step 1</li>
            <li class="active">Step 2</li>
            <li>Step 3</li>
            <li>Complete</li>
        </ul>
    </div>
    <div class="container register-form">
        <div class="form mt-5">
            <div class="note">
                <h1> User Image Form </h1>
            </div>


            <form action="{{ route('image.post') }}" method="POST" enctype="multipart/form-data"
                id="jqueryvalidation">
                @csrf
                <input type="hidden" class="form-control" name="profile_id" id="profile_id"
                    value="{{ $lastid }}">
                <div class="form-content">
                    {{-- <div class="row align-items-center mt-5">
                        <div class="col">
                            <input type="file" name="userimage" id="userimage" class="form-control">
                        </div>
                    </div>

                    <div class="row align-items-center mt-5">
                        <div class="col">
                            <input type="file" name="usersign" id="usersign" class="form-control">
                        </div>
                    </div> --}}


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="photo">User Photo</label>
                                {{-- <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button> --}}
                                <input type="file" name="userimage" data-toggle="modal"
                                    value="@if (!empty($last)) {{ $last->userimage }} @endif"
                                    class="form-control userimage " accept="image/png, image/gif, image/jpeg"
                                    @if (empty($last) && empty($last->userimage)) required @endif>
                                {{-- <img src="@if (!empty($user->image->userimage)){{ asset('public/image/' . $user->image->userimage) }} @else {{ asset('public/blank.png') }} @endif "  width="80"> --}}

                                <br><br>
                                <div id="userimagereload">
                                    <img id="preview-image-before-upload "
                                        src="@if (!empty($last->userimage)) {{ asset('public/image/' . $last->userimage) }} @else {{ asset('public/blank.png') }} @endif "
                                        alt="preview image" style="max-height: 150px;">
                                </div>
                                {{-- <input type="text" class="form-control" name="firstname" placeholder="First Name *" value="" /> --}}
                                {{-- <input type="text" class="form-control" name="firstname" placeholder="First Name *"  value="" /> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="photo">User sign Photo</label>
                                <input type="file" name="usersign" data-toggle="modal"
                                    value="@if (!empty($last)) {{ $last->usersign }} @endif"
                                    class="form-control usersign" accept="image/png, image/gif, image/jpeg"
                                    @if (empty($last) && empty($last->usersign)) required @endif>
                                <br><br>
                                <div id="usersignreload">
                                    <img id="preview-sign-before-upload "
                                        src="@if (!empty($last->usersign)) {{ asset('public/sign/' . $last->usersign) }} @else {{ asset('public/blank.png') }} @endif"
                                        alt="preview image" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start mt-5">
                        <div class="col-md-6">
                            <button type="button" class="btnSubmit">
                                <a href="{{ route('profile', $lastid) }}"> Previous</a>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="next"> Next </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="userimage"
                                    src="@if (!empty($last)) {{ $last->userimage }} {{-- @else{{ asset('public/blank.png') }} --}} @endif">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="thisModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">

                                <img id="usersign"
                                    src="@if (!empty($last)) {{ $last->usersign }} {{-- @else{{ asset('public/blank.png') }} --}} @endif">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="cropsign">Crop</button>
                </div>
            </div>
        </div>
    </div>








</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        var modal = $('#thisModal');
        var userimage = document.getElementById('usersign');
        var cropper;

        $("body").on("change", ".usersign", function(e) {
            var files = e.target.files;
            var done = function(url) {
                usersign.src = url;
                modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        modal.on('shown.bs.modal', function() {
            cropper = new Cropper(usersign, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });

        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#cropsign").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 200,
            });


            canvas.toBlob(function(blob) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    }
                });
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;


                    var profile = $('#profile_id').val();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('usersignupload') }}",
                        data: {
                            "profile": profile,
                            "_token": "{{ csrf_token() }}",
                            'usersign': base64data
                        },
                        success: function(data) {
                            modal.modal('hide');
                            
                            swal("success upload usersign", {
                                icon: "success",
                            });
                            $("#jqueryvalidation").load(window.location +
                                " #jqueryvalidation");
                        }
                    });
                }
            });
        });
    });

    $(document).ready(function(e) {
        var modal = $('#myModal');
        var userimage = document.getElementById('userimage');
        var cropper;

        $("body").on("change", ".userimage", function(e) {
            var files = e.target.files;
            var done = function(url) {
                userimage.src = url;
                modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        modal.on('shown.bs.modal', function() {
            cropper = new Cropper(userimage, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 200,
            });

            canvas.toBlob(function(blob) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    }
                });
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;


                    var profile = $('#profile_id').val();
                    
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('userimage-cropper/upload') }}",
                        data: {
                            "profile": profile,
                            "_token": "{{ csrf_token() }}",
                            'userimage': base64data
                        },
                        success: function(data) {
                            modal.modal('hide');
                            // alert("success upload userimage");
                            swal("success upload userimage", {
                                icon: "success",
                            });

                            $("#jqueryvalidation").load(window.location +
                                " #jqueryvalidation");

                        }
                    });
                }
            });
        });

        $('#jqueryvalidation').validate({
            rules: {
                // userimage: {
                //     required: true,
                // },
                // usersign: {
                //     required: true,
                // },z
            },
        });

        $('#userimage').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#usersign').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-sign-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    });
</script>

</html>
