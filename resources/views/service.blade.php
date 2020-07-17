<!DOCTYPE html>
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
        </style>
        
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="/js/app.js"></script>
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
            // $service = localStorage.getItem("service");
            // Session::put('service',$service);
            // $service.forEach(code(code));
            var wait  = 30; // Timer
            $service = ['QWERTASDFZXCV', 'RTYUFGHJVBNM'];
            code();
            var x = setInterval(function() { 
                var now = new Date().getSeconds(); 
                seconds = Math.floor(wait - (now % wait));
                document.getElementById("time").innerHTML = seconds + "s"; 
                    if (seconds >= 30) { 
                        code();
                    }
                }, 1000);
            function code() {
                $.ajax({
                    url: '/service/code', //php          
                    dataType: 'json', //data format 
                    data: {'key': $service},
                    type: 'post',
                    success: function (result) {
                        // var u = result.length;
                        for (var i = 0; i < result.length; i++) {
                            $('#' + i).html(result[i]);
                        }
                        // result.each(function(item, index) {
                        //     $('#' + index).html(item);
                        // });
                        $('#code').html(result); //output to html
                        alert("ada");
                    },
                    fail: function(){
                        $('#code').html("failed"); //output to html
                        alert("tidak ada");
                    },
                    complete: function (result){alert("??");} 
                });
            }
        </script>
    </head>
    <?php 
    $service = array(
        array('QWERASDFZXCV', 'Test1'),
        array('QWERASDFZXCV', 'Test2'),
        array('QWERASDFZXCV', 'Test3'),
    );
    ?>
    <body>
        <div class="flex-center position-ref full-height wrapper">
            <div class="content">
                <div class="title m-b-md">
                    Authenticator
                    <a id = "time"> </a>
                </div>
                @include('code');
                <div class="btn-group-fab" role="group" aria-label="FAB Menu">
                    <div>
                        <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Add Account"> <i class="fa fa-plus"></i> </button>
                        <button type="button" class="btn btn-sub btn-info has-tooltip" data-placement="left" title="QR Code" style="cursor: pointer" data-toggle="modal" data-target="#qrcode"> <i class="fa fa-qrcode"></i> </button>
                        <button type="button" class="btn btn-sub btn-danger has-tooltip" data-placement="left" title="Manual" style="cursor: pointer" data-toggle="modal" data-target="#manual"> <i class="fa fa-pencil"></i> </button>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal fade" id="manual">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Modal body..
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                    <!-- <div class="card-deck text-center mx-auto"> -->
                    <?php 
                        $i = 0;
                        foreach($service as $s):
                    ?>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = <?php echo $i; $i++;?>> </a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a>
                                <?php 
                                    echo $s[1];
                                ?>
                                </a>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    ?>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <!-- <a id = "time"> </a> -->
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <!-- <a id = "time"> </a> -->
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                        <div class="card mb-4 p-3 bg-light mx-auto">
                            <div class="card-body">
                                <div class = 'data'>
                                    <a id = "code"> </a>
                                    <a id = "time"></a>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a> Instagram (mustofakamal71) </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>