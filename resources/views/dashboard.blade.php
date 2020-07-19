<!DOCTYPE html>
<?php 
    $service = Session::get('service') ?? '';
    // echo $service;
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

            .btn-group-fab {
                position: absolute;
                width: 50px;
                height: auto;
                right: 20px; bottom: 20px;
            }
            .btn-group-fab div {
                position: relative; width: 100%;
                height: auto;
            }
            .btn-group-fab .btn {
                position: absolute;
                bottom: 0;
                border-radius: 50%;
                display: block;
                margin-bottom: 4px;
                width: 40px; height: 40px;
                margin: 4px auto;
            }
            .btn-group-fab .btn-main {
                width: 50px; height: 50px;
                right: 50%; margin-right: -25px;
                z-index: 9;
            }
            .btn-group-fab .btn-sub {
                bottom: 0; z-index: 8;
                right: 50%;
                margin-right: -20px;
                -webkit-transition: all 2s;
                transition: all 0.5s;
            }
            .btn-group-fab.active .btn-sub:nth-child(2) {
                bottom: 60px;
            }
            .btn-group-fab.active .btn-sub:nth-child(3) {
                bottom: 110px;
            }
            .btn-group-fab.active .btn-sub:nth-child(4) {
                bottom: 160px;
            }
            .btn-group-fab .btn-sub:nth-child(5) {
                bottom: 210px;
            }

            .card-img-top {
                width: 50%;
                height: 50%;
                /* object-fit: cover; */
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
                code();
                // document.getElementById("main").innerHTML = document.getElementById(clicked_id).innerHTML; 
            }
        </script>
        <script> 
            // var ProgressBar = include('progressbar.js');
            // var bar = new ProgressBar.Line('#test', {easing: 'easeInOut'});
            // bar.animate(1);  // Value from 0.0 to 1.0
            var wait  = 30; // Timer
            var service = <?php echo $service ?? ''?>;
            code();
            var x = setInterval(function() { 
                var now = new Date().getSeconds(); 
                seconds = Math.floor(wait - (now % wait));
                // document.getElementById("code").innerHTML = JSON.stringify(service);
                document.getElementById("time").innerHTML = seconds + "s"; 
                $('.progress .progress-bar').css("width",function() {
                return $(seconds).attr("aria-valuenow") + "%";
                });
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
                        $('#main-code').html(result[clicked - 1]['code']);
                        $('#main-service').html(service[clicked - 1]['service']);
                        // for (var i = 0; i < result.length; i++) {
                        //     $('#' + i ).html(JSON.stringify(result[i]));
                        // }
                        // for (let key in result) {
                        //     console.log(key, result[key]);
                        // }
                        result.forEach(function(item, index) {
                            $('#' + item['id']).html(item['code']);
                        });
                        $('#code').html(JSON.stringify(result)); //output to html
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
    </head>
    <body>
        <div class="flex-center position-ref wrapper bg-primary">
            <div class="content">
                <div class="title m-b-md">
                    Authenticator
                    <!-- <a id = "time"> </a> -->
                </div>
                <div class="container">
                    <div class="card title m-b-md">
                        <div class="card-deck" style="display: inline">
                            <a id="main-service" style="padding: 0px 60px"> </a>
                            <a id="main-code" style="padding: 0px 60px"> </a>
                            <a id="time" style="padding: 0px 60px"> </a></div>
                    </div>
                </div>

                @include('code');
                <!-- <div class="btn-group-fab" role="group" aria-label="FAB Menu">
                    <div>
                        <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Add Account"> <i class="fa fa-plus"></i> </button>
                        <button type="button" class="btn btn-sub btn-info has-tooltip" data-placement="left" title="QR Code" style="cursor: pointer" data-toggle="modal" data-target="#qrcode"> <i class="fa fa-qrcode"></i> </button>
                        <button type="button" class="btn btn-sub btn-danger has-tooltip" data-placement="left" title="Manual" style="cursor: pointer" data-toggle="modal" data-target="#manual"> <i class="fa fa-pencil"></i> </button>
                    </div>
                </div> -->

                <div class="modal fade" id="manual">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                Modal body
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container p-3 my-3 bg-dark text-dark">
                    <div class="row">
                    <!-- <div class="card-deck text-center mx-auto"> -->
                        <?php 
                        foreach($service as $s):
                        ?>
                        <div class="col-xs-7 col-sm-6 col-lg-3 col-md-4">
                            <div class="card mb-4 p-3 bg-light mx-auto">
                                <a class="btn stretched-link" onClick="store_id({{$s->id}})">
                                <img class="card-img-top img-fluid" src="{{asset('assets/smart-key.png')}}" alt="Icon Service">
                                <div class="card-body">
                                    <div class = 'data' style="display:none">
                                        <a id = <?php echo $s->id;?>> </a>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <a id = <?php echo $s->service;?>> <?php echo $s->service;?> </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        endforeach;
                        ?>
                        <div class="col-xs-7 col-sm-6 col-lg-3 col-md-4">
                            <div class="card mb-4 p-3 bg-light mx-auto">
                            <a class="btn btn-light" data-toggle="modal" data-target="#qrcode">
                                <div class="card-body">
                                    <div class = 'data'>
                                        <i class="fa fa-plus fa-lg fa-xs"></i> 
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <a> New Service </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>