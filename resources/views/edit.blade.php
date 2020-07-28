<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="edit"> Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ url('service/put_secret/') }}">
                <!-- <from onsubmit = "save_data()"> -->
                    @csrf
                    <input type="hidden" name="id" id="id" value=""> <br/>
                    <div class="form-group row">
                        <label for="secret" class="col-md-4 col-form-label text-md-right"> Secret Code</label>
                        <div class="col-md-6">
                            <input id="secret" type="text" class="form-control" name="secret" value="" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Account Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-9 mb-2">
                            <button name="btnDelete" type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </div>
                        <div class="col-3 mb-2">
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