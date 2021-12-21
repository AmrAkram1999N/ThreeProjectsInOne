<a class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
    Buy
</a>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header bg-dark">
                <h5 class="modal-title text-primary" id="exampleModalToggleLabel">Short-Link service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">


                <div class="card-body">


                    <form action="{{ route('Chain.User.Auth.BuyService') }}" method="POST">
                        @csrf
                        <div class="row gutters">


                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid  @enderror "
                                    placeholder="Enter User Name" value="">
                                @error('username')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password"
                                    class="form-control @error('password') is-invalid  @enderror "
                                    placeholder="Enter Password" value="">
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_employee">Employee Name</label>
                                <input type="text" name="name_employee"
                                    class="form-control @error('name_employee') is-invalid  @enderror "
                                    placeholder="Enter User Name" value="">
                                @error('name_employee')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid  @enderror "
                                    placeholder="Enter User Name" value="">
                                @error('phone_number')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="row gutters mb-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="sTate">State</label>
                                <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Zip Code</label>
                                <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                            </div>
                        </div>
                    </div> --}}
