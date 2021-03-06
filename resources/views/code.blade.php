<div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="QRCode">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" style="cursor: pointer; padding: 14px 16px; transition: 0.3s; background-color: #df86; ">
                        <li role="presentation" class="active" style="padding: 1px 8px;">
                            <a href="#qr_code" aria-controls="qr_code" role="tab" data-toggle="tab">QR Code</a>
                        </li>
                        <li role="presentation" style="padding: 1px 8px;">
                            <a href="#manual_input" aria-controls="manual_input" role="tab" data-toggle="tab">Manual Input</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="qr_code" style="padding: 14px 16px;">QR Code
                            <form id='qr_form' action="{{ url('service/post_secret/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- <div>
                                    <video autoplay="false" id="video-webcam">
                                        Browsermu tidak mendukung bro, upgrade donk!
                                    </video>
                                </div> -->
                                <!-- Webcam Script -->
                                <!-- <script type="text/javascript">
                                    // seleksi elemen video
                                    var video = document.querySelector("#video-webcam");

                                    // minta izin user
                                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

                                    // jika user memberikan izin
                                    if (navigator.getUserMedia) {
                                        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
                                        navigator.getUserMedia({ video: true }, handleVideo, videoError);
                                    }

                                    // fungsi ini akan dieksekusi jika  izin telah diberikan
                                    function handleVideo(stream) {
                                        video.srcObject = stream;
                                    }

                                    function capture(stream) {
                                        video.pause();
                                        stream.stop();
                                    }

                                    // fungsi ini akan dieksekusi kalau user menolak izin
                                    function videoError(e) {
                                        // do something
                                        alert("Izinkan menggunakan webcam untuk demo!")
                                    }
                                </script> -->
                                <video id="preview"></video>
                                <input type="file" name="qr" id="qr">
                                <input type="hidden" name="qr_text" id="qr_text">
                                <input type="submit" value="Upload Image" name="submitBtn">
                            </form>
                            <script type="text/javascript">
                                var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
                                    scanner.addListener('scan',function(content){
                                        // alert(content);
                                        $('#qr_text').val(content);
                                        document.getElementById("qr_form").submit();
                                        //window.location.href=content;
                                    });
                                $('#qrcode').on('shown.bs.modal', function() {
                                    Instascan.Camera.getCameras().then(function (cameras){
                                        if(cameras.length>0){
                                            scanner.start(cameras[0]);
                                            $('[name="options"]').on('change',function(){
                                                if($(this).val()==1){
                                                    if(cameras[0]!=""){
                                                        scanner.start(cameras[0]);
                                                    }else{
                                                        alert('No Front camera found!');
                                                    }
                                                }else if($(this).val()==2){
                                                    if(cameras[1]!=""){
                                                        scanner.start(cameras[1]);
                                                    }else{
                                                        alert('No Back camera found!');
                                                    }
                                                }
                                            });
                                        }else{
                                            console.error('No cameras found.');
                                            alert('No cameras found.');
                                        }
                                    }).catch(function(e){
                                        console.error(e);
                                        alert(e);
                                    });
                                });
                                $('#qrcode').on('hide.bs.modal', function() {
                                    scanner.stop();
                                });
                            </script>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="manual_input" style="padding: 14px 16px;">
                            <form method="POST" action="{{ url('service/post_secret/') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="secret" class="col-md-4 col-form-label text-md-right"> Secret Code</label>
                                    <div class="col-md-6">
                                        <input id="secret" type="text" class="form-control" name="secret" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Account Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-5">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>