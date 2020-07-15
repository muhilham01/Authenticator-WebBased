<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                color: #636b6f;
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
        </style>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Authenticator
                </div>
                <div class="links">
                    <a> Instagram (mustofakamal71) </a> <br>
                </div>
                <div class = 'data left'>
                    <a id = "code"> </a>
                    <a id = "time"></a>
                </div>
                <script> 
                    var deadline;
                    var wait = 30000;
                    if (localStorage.getItem("time") != 0)
                    {
                        document.getElementById("code").innerHTML = localStorage.getItem("code");
                        deadline = localStorage.getItem("count");
                    } else if (localStorage.getItem("count") == null ){
                        code();
                        deadline = new Date().getTime()+ wait; 
                    }
                    // var start = new Date().getTime() + wait;
                    var x = setInterval(function() { 
                        var now = new Date().getTime(); 
                        var t = deadline - now;
                        var seconds = Math.floor((t % (1000 * 60)) / 1000); 
                        document.getElementById("time").innerHTML = seconds + 2 + "s "; 
                            if (t < 1) { 
                                deadline = new Date().getTime() + wait - 1000;
                                code();
                                // document.getElementById("time").innerHTML = wait + "s";
                            } 
                            localStorage.setItem("code", document.getElementById("code").innerHTML);
                            localStorage.setItem("count", deadline);
                        }, 1000); 
                    function code() {
                        $.ajax({
                            url: '/user/code', //php          
                            dataType: 'json', //data format   
                            success: function (result) {
                                $('#code').html(result); //output to html
                            },
                            fail: function(){
                                $('#code').html("failed"); //output to html
                            }
                        });
                    }
                </script> 
            </div>
        </div>
    </body>
</html>