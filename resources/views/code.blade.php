<script> 
    function save_data() {
        var secret = document.getElementById("secret");
        var name = document.getElementById("name");
        services = {name, secret};
        // alert(input);
        var service = [];
        service = JSON.parse(localStorage.getItem("service"));
        service = service != null ? service : [];
        service.push([name.value, secret.value]);
        localStorage.setItem("service", JSON.stringify(service)); 
        // var storedValue = localStorage.getItem("server"); 
        // document.getElementById("QRCode").innerHTML = input + "s";
        window.location.reload();
    }
</script>


<div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="QRCode">QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ url('service/post_secret/') }}">
                <!-- <from onsubmit = "save_data()"> -->
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