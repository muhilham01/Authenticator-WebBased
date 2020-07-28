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
                <form method="POST" action="{{ url('service/post_secret/') }}">
                <!-- <from onsubmit = "save_data()"> -->
                    @csrf

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
                            <div role="tabpanel" class="tab-pane active" id="qr_code" style="padding: 14px 16px;">QR Code</div>
                            <div role="tabpanel" class="tab-pane" id="manual_input" style="padding: 14px 16px;">
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
                            </div>
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