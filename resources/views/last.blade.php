<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> </title>
    <style>
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
    </style>
</head>

<body>
    <div class="container">
        <ul class="progressbar">
            <li class="active">Step 1</li>
            <li class="active">Step 2</li>
            <li class="active">Step 3</li>
            <li class="active">Complete</li>
        </ul>
    </div>
    <div class="container register-form">
        <div class="form mt-5">
            <div class="note">
                <h1> confirmation Page </h1>
            </div>
            <table align="center" border="3">
                <tr>
                    <td>Id</td>
                    <td>{{ $photos->id }}</td>
                </tr>
                <tr>
                    <td>firstname</td>
                    <td>{{ $photos->firstname }}</td>
                </tr>
                <tr>
                    <td>lastname</td>
                    <td>{{ $photos->lastname }}</td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>{{ $photos->phone }}</td>
                </tr>
                <tr>
                    <td>birthdate</td>
                    <td>{{ $photos->birthdate }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $photos->email }}</td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>{{ $photos->address }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $photos->age }}</td>
                </tr>
                <tr>
                    <td>image</td>
                    <td> <img src="{{ asset('public/image/' . $images->userimage) }}" alt="image" width="180">
                    </td>
                </tr>
                <tr>
                    <td>image</td>
                    <td> <img src="{{ asset('public/sign/' . $images->usersign) }}" alt="image" width="180">
                    </td>
                </tr>
                <tr>
                    <td>ssc_year</td>
                    <td>{{ $photos->ssc_year }}</td>
                </tr>
                <tr>
                    <td>ssc_marks</td>
                    <td>{{ $photos->ssc_marks }}</td>
                </tr>
                <tr>
                    <td>hsc_year</td>
                    <td>{{ $photos->hsc_year }}</td>
                </tr>
                <tr>
                    <td>hsc_marks</td>
                    <td>{{ $photos->hsc_marks }}</td>
                </tr>
                <tr>
                    <td>bachelor_year</td>
                    <td>{{ $photos->bachelor_year }}</td>
                </tr>
                <tr>
                    <td>bachelor_CGPA</td>
                    <td>{{ $photos->bachelor_CGPA }}</td>
                </tr>
                <tr>
                    <td>master_year</td>
                    <td>{{ $photos->master_year }}</td>
                </tr>
                <tr>
                    <td>master_CGPA</td>
                    <td>{{ $photos->master_CGPA }}</td>
                </tr>
            </table>
            <div class="row justify-content-start mt-5">
                <div class="col-md-6">
                    <button type="submit" class="btnsubmit">
                        <a href="{{ route('education', $photos->id) }}"> Previous</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="next">
                        <a href="{{ route('list') }}"> Next</a>
                    </button>
                </div>
            </div>
</body>
</html>
