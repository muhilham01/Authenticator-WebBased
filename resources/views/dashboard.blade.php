<!DOCTYPE html>
<?php 
    $service = Session::get('service') ?? '';
    $user = Auth::user();
    // print_r(Session::all());
    // echo Auth::user();
    // echo Session::get('status');
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            @media print {
                html, body {
                display: none;  /* hide whole page */
                }
            }
            html, body {
                background-card-columnsor: #fff;
                card-columnsor: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: none;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 4em;
            }

            .data {
                font-size: 3em;
                /* text-align: left; */
            }

            .links > a {
                card-columnsor: #636b6f;
                padding:  25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: none;
            }

            .left {
                padding-left: 50px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card-img-top {
                width: 75px;
                /* height: 50%; */
                /* object-fit: cover; */
            }

            .card > .card-header:hover .btn {
                display: none;
                /* opacity: .5 */
            }

            .card > .card-header:hover {
                background-color: transparent !important;
                /* opacity: .6 */
            }

            .card > .card-header:hover .text {
                display: block;
            }

            .card > .card-header:hover .img {
                width: 100%;
            }

            .text {
                display: none;
            }
        </style>
        
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="/js/app.js"></script>
        <script>
            var clicked = 1;
        </script>
        <script>
            $(function() {
                $('.btn-group-fab').on('click', '.btn', function() {
                    $('.btn-group-fab').toggleClass('active');
                });
                $('has-tooltip').tooltip();
                });
        </script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            function store_id(clicked_id)
            {
                // alert(clicked_id);
                clicked = clicked_id;
                service_id = clicked;
                $("#editButton").data('id').value = service_id;
                // $(".modal-body #id").val(service_id);
                code();
                // document.getElementById("main").innerHTML = document.getElementById(clicked_id).innerHTML; 
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
            <div class="logo" style="float: left">
                <a class="navbar-brand" href="#">
                    <div id="logoca"><img src="https://www.cyberarmy.id/public/depan/img/logo_ca.png" width="150px"></div>
                </a>
            </div>

            <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- style="margin: 0px 5% 0px auto"> -->
                    <!-- <li class="nav-item active">
                        <div class="dropdown dropdownA">
                            <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USER</a>
                            <ul class="dropdown-menu" style="border-color: #252E71">
                                
                                <a class="dropdown-item" href="https://www.cyberarmy.id/layanan/vdp">Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://www.cyberarmy.id/layanan/company">Logout</a>
                                
                            </ul>
                        </div>
                    </li> -->
                    
                    <li class="nav-item dropdown" style="padding: 10px;">
                        <a class="btn btn-outline-success dropdown-toggle dropdown-toggle-lang nav-link" style="padding: .35rem 1rem; color: white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>
                                {{$user->name}}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" id="profileButton" href="#" data-toggle="modal" data-id="1" data-target="#profile" onclick="">Profile</a>
                            <a class="dropdown-item" href="http://localhost:8000/home" onclick="langEn()">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="wrapper bg-dark">
            <div class="title content m-b-md" style="color: white">
                Authenticator
                <!-- <a id = "time"> </a> -->
            </div>
            <div class="container">
                <div class="card title content m-b-md">
                    <div class="progress bg-white">
                        <div class="progress-bar bg-success progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        </div>
                    </div>
                    <div class="card-body" style="display: inline;">
                        <div class="row">
                            <div class="col-lg-4">
                                <h1 id="main-service"> No </h1>
                            </div>
                            <div class="col-lg-4">
                                <h1 id="main-code"> Service </h1>
                            </div>
                            <div class="col-lg-4">
                                <h1 id="time"> </h1>
                            </div>
                            <button class="btn btn-success fa fa-copy" id="copyButton" style="position: absolute; right: 70px;"></button>
                            <button class="btn btn-info fa fa-edit" id="editButton" style="position: absolute; right: 20px;" data-toggle="modal" data-id="1" data-target="#edit"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Service -->
            <script>
                $(document).on("click", "#editButton", function () {
                    // service_id = $(this).data('id');
                    $(".modal-body #id").val(clicked);
                    // $(".modal-body #id").html(clicked);
                    $.ajax({
                        url: '../service/edit_secret/' + clicked, //php          
                        dataType: 'json', //data format 
                        // data: {'key': service, "_token": "{{ csrf_token() }}"},
                        type: 'get',
                        success: function (result) {
                            // alert(JSON.stringify(result));
                            $(".modal-body #name").val(result[0]['service']);
                            $(".modal-body #secret").val(result[0]['secret']);
                        },
                        fail: function(){
                        // $('#code').html("failed"); //output to html
                        alert("tidak ada");
                        },
                        // complete: function (result){alert("??");},
                    });
                    // document.getElementById("id").innerHTML = "blah"
                });
            </script>

            <!-- Copy  -->
            <script>
                document.getElementById("copyButton").addEventListener("click", function() {
                    copyToClipboardMsg(document.getElementById("main-code"));
                });

                function copyToClipboardMsg(elem) {
                    var succeed = copyToClipboard(elem);
                    // var msg;
                    // if (!succeed) {
                    //     msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
                    // } else {
                    //     msg = "Text copied to the clipboard."
                    // }
                    // if (typeof msgElem === "string") {
                    //     msgElem = document.getElementById(msgElem);
                    // }
                    // msgElem.innerHTML = msg;
                    // setTimeout(function() {
                    //     msgElem.innerHTML = "";
                    // }, 2000);
                }

                function copyToClipboard(elem) {
                    // create hidden text element, if it doesn't already exist
                    var targetId = "_hiddenCopyText_";
                    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
                    var origSelectionStart, origSelectionEnd;
                    if (isInput) {
                        // can just use the original source element for the selection and copy
                        target = elem;
                        origSelectionStart = elem.selectionStart;
                        origSelectionEnd = elem.selectionEnd;
                    } else {
                        // must use a temporary form element for the selection and copy
                        target = document.getElementById(targetId);
                        if (!target) {
                            var target = document.createElement("textarea");
                            target.style.position = "absolute";
                            target.style.left = "-9999px";
                            target.style.top = "0";
                            target.id = targetId;
                            document.body.appendChild(target);
                        }
                        target.textContent = elem.textContent;
                    }
                    // select the content
                    var currentFocus = document.activeElement;
                    target.focus();
                    target.setSelectionRange(0, target.value.length);
                    
                    // copy the selection
                    var succeed;
                    try {
                        succeed = document.execCommand("copy");
                    } catch(e) {
                        succeed = false;
                    }
                    // restore original focus
                    if (currentFocus && typeof currentFocus.focus === "function") {
                        currentFocus.focus();
                    }
                    
                    if (isInput) {
                        // restore prior selection
                        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
                    } else {
                        // clear temporary content
                        target.textContent = "";
                    }
                    return succeed;
                }
            </script>
            
            @include('profile');
            @include('edit');
            @include('code');

            <div class="container bg-light">
                <div class="row">
                <!-- <div class="card-deck text-center mx-auto"> -->
                    <?php 
                    foreach($service as $s):
                    ?>
                    <div class="col-xs-7 col-sm-6 col-lg-2 col-md-4" style="margin-bottom:20px;">
                        <div class="card d-flex flex-fill mx-auto text-center" style="box-shadow: 0px 0px 15px #48494a;">
                            <!-- <a class="btn" onClick="store_id({{$s->id}})"> -->
                            <div class="card-header">
                                <img class="card-img-top img" src="{{asset('assets/smart-key.png')}}" alt="Icon Service" width="150px">
                                <!-- <h5 id = "{{$s->service}}"> {{$s->service}} </h5> -->
                                <button class="btn stretched-link btn-sm" id="{{$s->service}}" style="color:dark;" onMouseOver="store_id({{$s->id}})"> 
                                    {{$s->service}}  
                                </button>
                                <!-- <div class="text" style="color:dark;"> <br> <h6> {{$s->service}} <h6> </div> -->
                            </div>
                        </div>
                    </div>
                    <?php 
                    endforeach;
                    ?>
                    <div class="col-xs-7 col-sm-6 col-lg-2 col-md-4">
                        <div class="card d-flex flex-fill mx-auto text-center" style="box-shadow: 0px 0px 15px #48494a;">
                            <!-- <a class="btn" onClick="store_id({{$s->id}})"> -->
                            <div class="card-header">
                                <img class="card-img-top img" src="{{asset('assets/plus.png')}}" alt="Icon Service" width="150px">
                                <!-- <h5 id = "{{$s->service}}"> {{$s->service}} </h5> -->
                                <i class="stretched-link fa fa-plus" style="color:dark;" data-toggle="modal" data-target="#qrcode">
                                    New Service
                                </i> 
                                <!-- <div class="text" style="color:dark;"> <br> <h6> {{$s->service}} <h6> </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script> 
            var wait  = 30; // Timer
            var service = <?php echo $service ?? ''?>;
            code();
            var x = setInterval(function() { 
                var now = new Date().getSeconds(); 
                var seconds = Math.floor(wait - (now % wait));
                // document.getElementById("code").innerHTML = JSON.stringify(service);
                document.getElementById("time").innerHTML = seconds + "s"; 
                $(".progress-bar").css("width", seconds * 3.333334 + "%");
                    if (seconds >= 30) { 
                        code();
                    }
                }, 1000);
            function code() {
                $.ajax({
                    url: '/service/code', //php          
                    dataType: 'json', //data format 
                    data: {'key': service, "_token": "{{ csrf_token() }}"},
                    type: 'post',
                    success: function (result) {
                        // alert(JSON.stringify(result));
                        // var u = result;
                        // $('#main-code').html(result[clicked - 1]['code']);
                        // $('#main-service').html(service[clicked - 1]['service']);
                        // alert(clicked);
                        for (var i = 0; i < result.length; i++) {
                            // $('#' + i ).html(JSON.stringify(result[i]));
                            if(result[i]['id'] == clicked) {
                                $('#main-code').html(result[i]['code']);
                                $('#main-service').html(service[i]['service']);
                                break;
                            }
                        }
                        // for (let key in result) {
                        //     console.log(key, result[key]);
                        // }
                        // result.forEach(function(item, index) {
                        //     $('#' + item['id']).html(item['code']);
                        // });
                        // $('#code').html(JSON.stringify(result)); //output to html
                        // $('#2').html(JSON.stringify(result[0]['id']));
                        // result.forEach(function(item, index) {
                        //     $('#' + index).html(JSON.stringify(item));
                        // });
                        // alert("ada");
                    },
                    fail: function(){
                        $('#code').html("failed"); //output to html
                        alert("tidak ada");
                    }
                    // complete: function (result){alert("??");} 
                });
            }
        </script>
    </body>
</html>