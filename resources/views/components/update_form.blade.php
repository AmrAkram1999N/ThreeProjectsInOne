<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-fw fa-camera"></i>
    <span>Change Photo </span>
</button> --}}

<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle1" role="button">
    <i class="fa fa-fw fa-camera"></i>
    <span>Update Information </span>
</a>


<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-primary" id="exampleModalToggleLabel">Upload a new photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">




                <form action="{{ route($routeUpdate) }}" method="POST" accept="image/*" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Account Name</label>
                        <input type="text" class="form-control mb-0 @error('name_employee') is-invalid @enderror"
                            id="name_employee" name="name_employee" placeholder="Enter Yuor Full Name"
                            value="{{ $nameemployee }}" required autofocus />
                        @error('name_employee')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">User_Name</label>
                        <input type="text" class="form-control mb-0 @error('username') is-invalid @enderror"
                            id="username" name="username" placeholder="Enter your username" value="{{ $username }}"
                            required autofocus />

                        @error('username')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone_Number</label>
                        <input type="text" name="phone_number"
                            class="form-control mb-0 @error('phone_number') is-invalid  @enderror "
                            placeholder="Enter your phone number" value="{{ $phonenumber }}">
                        @error('phone_number')
                            <small class="text-danger">
                                {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        @error('password')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer d-block">
                        <button class="btn btn-warning float-end" type="submit" data-bs-target="#exampleModalToggle2"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
