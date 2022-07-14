<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

        .bachelor {
            /* margin-right: 1px; */
            font-size: 20px;
            /* color: hotpink; */
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
            <li class="active">Step 2</li>
            <li class="active">Step 3</li>
            <li>Complete</li>
        </ul>
    </div>



    <div class="container register-form">
        <div class="form mt-5">
            <div class="note">
                <h1> User Page </h1>
            </div>




            <form action="{{ route('education.post') }}" method="POST" id="jqueryvalidation">
                @csrf
              
                <input type="hidden" class="form-control" name="id"
                    value="@if(isset($profile_data)) {{ $profile_data->id}} @endif   ">
                {{-- <input type="hidden" class="form-control" name="editid" value="@if (isset($user)){{ $user->id}}@endif   "> --}}

                <div class="form-content">

                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="number" class="form-control" name="ssc_marks"  value="@if(isset($profile_data)){{ $profile_data->ssc_marks}}@endif"  placeholder="ssc_marks  *"  onkeypress="return /[0-9]/i.test(event.key)" maxlength="2"/>
                            </div>
                            <div class="form-group mt-5">
                                <input type="number" class="form-control" name="hsc_marks" value="@if(isset($profile_data)){{ $profile_data->hsc_marks }}@endif"  placeholder="hsc_marks  *"  onkeypress="return /[0-9]/i.test(event.key)" maxlength="2"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="ssc_year" value="@if(isset($profile_data)){{$profile_data->ssc_year}}@endif"  placeholder="SSC Passing Year  *" onkeypress="return /[0-9]/i.test(event.key)" maxlength="4"/>
                            </div>
                            <div class="form-group mt-5">
                                <input type="number" class="form-control" name="hsc_year" value="@if(isset($profile_data)){{$profile_data->hsc_year}}@endif"  placeholder="HSC Passing Year  *" onkeypress="return /[0-9]/i.test(event.key)" maxlength="4"/>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="bachelor_CGPA"  value="@if(isset($profile_data)){{$profile_data->bachelor_CGPA}}@endif" placeholder="bachelor_CGPA  *"onkeypress="return /[0-9]/i.test(event.key)" maxlength="2"/>
                            </div>
                            <div class="form-group mt-5">
                                <input type="number" class="form-control" name="master_CGPA" value="@if(isset($profile_data)){{$profile_data->master_CGPA}}@endif" placeholder="master_CGPA"onkeypress="return /[0-9]/i.test(event.key)" maxlength="2"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="bachelor_year" value="@if (isset($profile_data)){{$profile_data->bachelor_year}}@endif"  placeholder="BACHELOR Passing Year  *"  onkeypress="return /[0-9]/i.test(event.key)" maxlength="4"/>
                            </div>
                            <div class="form-group mt-5">
                                <input type="number" class="form-control" name="master_year"  value="@if(isset($profile_data)){{$profile_data->master_year}}@endif"  placeholder="MASTER Passing Year  "  onkeypress="return /[0-9]/i.test(event.key)" maxlength="4" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start mt-5">
                        <div class="col-md-6">
                            <button type="submit" class="btnsubmit">
                                <a href="{{ route('image', $profile_data->id) }} "> Previous</a>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="next"> Submit </button>
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
                ssc_marks: {
                    required: true,
                },
                hsc_marks: {
                    required: true,
                },
                ssc_year: {
                    required: true,
                },
                hsc_year: {
                    required: true,
                },
                bachelor_CGPA: {
                    required: true,
                },
                bachelor_year: {
                    required: true,
                },
            },
        });
    });
</script>


</html>
