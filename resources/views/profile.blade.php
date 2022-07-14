<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> Bootstrap 4 Registration Form Example </title>
    <style>
        .note {
            text-align: center;
            height: 100px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        .error {
            color: red;
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
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
            font-size: 20px;
            margin-left: 800px;

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
    </style>
</head>
<body>
    <div class="container">
        <ul class="progressbar">
            <li class="active">Step 1</li>
            <li >Step 2</li>
            <li>Step 3</li>
            <li>Complete</li>
        </ul>
    </div>
    <div class="container register-form">
        <div class="form mt-5">
            <div class="note">
                <h1> User Details Form </h1>
            </div>
            <form action="{{ route('profile.post' ) }}" method="POST" id="jqueryvalidation">
                @csrf

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstname"   value="@if(isset($user)){{ $user->firstname }}@endif" placeholder="First Name *"  />
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="phone"   value="@if(isset($user)){{ $user->phone }}@endif"  placeholder="Phone Number *"
 />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname"  value="@if(isset($user)){{ $user->lastname }}@endif"    placeholder="Last Name *" />
                            </div>
                            <div class="form-group mt-5">
                                <input type="date" class="form-control" name="birthdate"     value="@if(isset($user)){{ $user->birthdate }}@endif"     />
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mt-5">
                        <div class="col">
                            <input type="text" class="form-control" name="email"       value="@if(isset($user)){{ $user->email }}@endif"           placeholder=" Enter Email Address">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col mt-4">
                            <input type="text" class="form-control" name="address" placeholder=" Address" value="@if(isset($user)){{ $user->address }}@endif"      >
                        </div>
                    </div>

                    <div class="row align-items-center mt-4">
                        <div class="col mt-4">
                            {{-- <input type="number" class="form-control" name="age" placeholder="age"  > --}}
                            <select name="age" class="form-control" placeholder="age"    >
                                <option disabled="disabled" selected>select age</option>
                                <option name="age" value="25"  @if(isset($user)){{$user->age == 25 ? 'selected' : '' }}   @endif >25</option>
                                <option name="age" value="35"  @if(isset($user)){{$user->age == 35 ? 'selected' : '' }}   @endif >35</option>
                                <option name="age" value="45"  @if(isset($user)){{$user->age == 45 ? 'selected' : '' }}   @endif >45</option>
                                <option name="age" value="55"  @if(isset($user)){{$user->age == 55 ? 'selected' : '' }}   @endif >55</option>
                                <option name="age" value="65"  @if(isset($user)){{$user->age == 65 ? 'selected' : '' }}   @endif >65</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="token" placeholder="token" value="@if(isset($user)){{ $user->token }}@endif" >

                    

                    <div class="row justify-content-start mt-5">
                        <div class="col">
                            <button type="submit" class="btnSubmit"> Next </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#jqueryvalidation').validate({
            rules: {
                firstname: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
                birthdate: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                address: {
                    required: true,
                },
                age:{
                    required: true,
                },

            },
        });
    });
</script>

</html>
