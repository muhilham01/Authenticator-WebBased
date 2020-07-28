<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="edit"> Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ url('service/put_profile/') }}">
                <!-- <from onsubmit = "save_data()"> -->
                    @csrf
                    <input type="hidden" name="id" id="id" value=""> <br/>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"> Email</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Password</label>
                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="password" value="{{Auth::user()->password}}" required>
                        </div>
                    </div> -->

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