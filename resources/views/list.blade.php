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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
        }

        .btnedit {
            color: black;
            background: #0062cc;
        }

        .btndelete {
            color: black;
            background: red;
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

        .add {
            margin-top: 35px;
        }

        body {
            background-color: rgb(225, 236, 235);
        }

        .adduser {
            margin-left: 295px;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .table {
            text-align: center;
        }

        a {
            color: black;

        }

        a:hover {
            color: black;

        }
    </style>
</head>

<body>
    <div class="add">
        <table align="center">
            <tr>
                <td width="100px;">
                    <select class="form-control" name="status" id="changepagination" onclick="changepagination()">
                        <option selected="true" name="5" value="5">5</option>
                        <option name="10" value="10">10</option>
                        <option name="20" value="20">20</option>
                    </select>
                </td>
                <td width="180px;">
                    <div>
                        <select class="form-control" name="status" id="selectaction" onclick="checkstatus()">
                            <option selected="true" name="all" value="status">All</option>
                            <option name="active" value="1">Active</option>
                            <option name="deactive" value="0">Deactive</option>
                        </select>
                    </div>
                </td>

                <td width="950px;" align="center">
                    <button class="btn btn-primary adduser" style="margin-top:15px;  width:120px;  height:60px;">
                        <a href="{{ route('profile.get') }}" style="color: white;">Add</a>
                    </button>
                </td>
                <td width="250px;">
                    <input type="text" class="form-control" id="search_bar_value" name="search"
                        placeholder="search..." />
                </td>
                <td width="170px;">
                    <button type="submit" class="btn btn-primary" id="search_bar"
                        onclick="search_data()">Search</button>
                    <button type="submit" class="btn btn-primary" id="reset"onclick="pagereload()">reset</button>
                </td>
                <td width="80px;">
                    <button class="btn btn-success active-all">Active</button>
                </td>
                <td>
                    <button class="btn btn-danger inactive-all">InActive</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="register-form">
        <div class="form mt-5">
            <div class="note">
                <h1> List Page </h1>
            </div>
            <div class="table">
                <table align="center" border="3" width="1918px;" id="categoryTable" >
                    @include('table')
                </table>
                {!! $users->appends(\Request::except('page'))->render() /* /url::current() */ !!}

            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</body>
<script>
    /********************** Delete Function ***********************/
    function deletefun(id) {
        swal({
            title: "Delete Data",
            text: "Are you sure you want to delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '{{ route('destory') }}',
                    method: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#categoryTable").load(window.location + " #categoryTable");
                    }
                });
                swal("Poof! Your User has been deleted!", {
                    icon: "success",
                });

            } else {
                swal("Your Data file is safe!");
            }
        });
    }

    /******************* Change User Status*********************/
    function change(id) {

        var selected_drobox_value = $('#selectaction :selected').val();

        swal({
            title: "Change User Status",
            text: "Are you sure you want to Change Status?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '{{ route('changeStatus') }}',
                    method: 'get',
                    data: {
                        id: id,
                        selected_drobox_value: selected_drobox_value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#categoryTable').html(data.html)
                        $("#statuscheck" + id).load(window.location + " #statuscheck" + id);
                    }
                });
                swal("Poof! Your User Status Change Successfully!", {
                    icon: "success",
                });
            } else {
                swal("Your Data  is safe!");
            }
        });
    }

    /**********************Create a Dynamic url********************/




    /**********************Pagination Dropdown function*****************/

    function changepagination() {
        var changepagination = $('#changepagination :selected').val();
        var selected_drobox_value = $('#selectaction :selected').val();
        $.ajax({
            url: '{{ route('changepagination') }}',
            method: 'get',
            data: {
                changepagination: changepagination,
                selected_drobox_value: selected_drobox_value,
            },
            success: function(data) {
                $('#categoryTable').html(data.html)
            }
        });

       /*  $.ajax({
            url: '{{ route('list') }}',
            method: 'get',
            data: {
                changepagination: changepagination,
                selected_drobox_value: selected_drobox_value,
            },
            success: function(data) {
                $('#categoryTable').html(data.html)
            }

        }); */
    }


    /****************** Open a Age Dropdown Function ****************/
    function editfun(element) {

        var parent = $(element).parent().parent();
        $(parent).find('label').hide();
        $(parent).find('#edit_age').hide();
        var input = $(parent).find('.show-data');
        $(input).show();
        var button = $(parent).find('#save_age');
        $(button).show();

    }
    /**************** Age Save function *******************/
    function savefun(element, id) {
        var parent = $(element).parent().parent();
        var age_value = $('#functionedit' + id + ' option:selected').text();
        $.ajax({
            url: '{{ route('editage') }}',
            method: 'post',
            data: {
                id: id,
                age: age_value,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $(parent).find('.show-data').hide();
                $(parent).find('#save_age').hide();
                var input = $(parent).find('label');
                $(input).show();
                var button = $(parent).find('#edit_age');
                $(button).show();
                $("#agefield" + id).load(window.location + " #agefield" + id);
            }
        });
    }

    /***************************Status Dropdown function**********************/
    function checkstatus() {
        var selected_drobox_value = $('#selectaction :selected').val();
        var changepagination = $('#changepagination :selected').val();

        $.ajax({
            url: '{{ route('activeuser') }}',
            method: 'get',
            data: {
                // "status": $('#selectaction').val()
                selected_drobox_value: selected_drobox_value,
                changepagination:changepagination,

            },
            success: function(data) {
                $('#categoryTable').html(data.html)
            }
        });

    }


    /********************* Search Data ************************/
    function search_data() {

        var selected_drobox_value = $('#selectaction :selected').val();
        var search_value = $('#search_bar_value').val();
        $.ajax({
            url: '{{ route('search') }}',
            method: 'get',
            data: {
                search_value: search_value,
                selected_drobox_value: selected_drobox_value,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#categoryTable').html(data.html)
            }
        });

    }

    /********************On click Page Reset ******************/
    
    function pagereload() {
        $("#categoryTable").load(window.location + " #categoryTable");

        $('input[type="text"]').val(''); 

        // $('#changepagination').val('');
        // $('#selectaction').val('');
        // $("#changepagination").load(window.location + " #changepagination");
        // $("#selectaction").load(window.location + "#selectaction");



        // $('#selectaction').val('');
        // $("#selectaction").load(window.location + " #selectaction");

        // $.ajax({
        //     url: '{{ route('list') }}',
        //     method: 'get',
        //          datatype:html,
        //          cache:false,
        //     data: {
        //          search_value:search_value,
        //          selected_drobox_value: selected_drobox_value,
        //         _token: '{{ csrf_token() }}'
        //     },
        //     success: function(data) {
        //         $('#categoryTable').html(data.html)
        //     } 
        // });
    }

    /********************select a multiple checkbox ************************/
    function checkall() {

        if ($('#master').is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    }

    /*********************Active all user ***************************/
    $('.active-all').on('click', function() {
        var idsArr = [];
        $(".sub_chk:checked").each(function() {
            idsArr.push($(this).attr('data-id'));
        });
        if (idsArr.length <= 0) {
            swal("Please select atleast one record", {
                icon: "warning",
            });
        } else {

            swal({
                title: "Change Users Status",
                text: "Are you sure you want to Change Status?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: '{{ route('allactive') }}',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == 200) {

                                $(".sub_chk:checked").each(function() {
                                    swal("Poof! Your User Status Change Successfully!", {
                                        icon: "success",
                                    });
                                    $("#categoryTable").load(window.location +
                                        " #categoryTable");
                                });
                            } else {
                                swal("Whoops Something went wrong!!'", {
                                    icon: "warning",
                                });
                            }
                        },

                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                }
            });
        }

    });


    /***********************Inactive All User************************/
    $('.inactive-all').on('click', function() {
        var idsArr = [];
        $(".sub_chk:checked").each(function() {
            idsArr.push($(this).attr('data-id'));
        });
        if (idsArr.length <= 0) {
            swal("Please select atleast one record", {
                icon: "warning",
            });
        } else {

            swal({
                title: "Change Users Status",
                text: "Are you sure you want to Change Status?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var strIds = idsArr.join(",");

                    $.ajax({
                        url: '{{ route('allinactive') }}',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == 200) {

                                $(".sub_chk:checked").each(function() {
                                    swal("Poof! Your User Status Change Successfully!", {
                                        icon: "success",
                                    });
                                    $("#categoryTable").load(window.location +
                                        " #categoryTable");
                                });
                            } else {
                                swal("Whoops Something went wrong!!'", {
                                    icon: "warning",
                                });
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            });
        }
    });

    /********************Open a Image in popup**********************/
    var modal = document.getElementById('myModal');
    var images = document.getElementsByClassName('myImages');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    for (var i = 0; i < images.length; i++) {
        var img = images[i];
        img.onclick = function(evt) {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>
