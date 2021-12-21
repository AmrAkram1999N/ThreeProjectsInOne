<!-- Click on Modal Button -->
<button type="button" class="btn btn-sm btn-outline-secondary w-100 font-weight-bold text-black" data-bs-toggle="modal" data-bs-target="#modalForm">
    Buy More Services
</button>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add the details of the service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">

                <form method="POST" action="{{ route('Chain.User.Auth.buyMore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Account Name</label>
                        <input type="text" class="form-control mb-0 @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Account Name" required autofocus />
                        @error('name')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control mb-0 @error('username') is-invalid @enderror"
                            id="username" name="username" placeholder="Username" required autofocus />

                        @error('username')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
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

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                            class="form-control mb-0 @error('password_confirmation') is-invalid @enderror" id="password"
                            name="password_confirmation" placeholder="Confirm Password" required />
                        @error('password_confirmation')
                            <div>
                                <small class="text-danger">
                                    {{ $message }}</small>
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Services</label>
                        <select class="form-select mb-0 @error('service') is-invalid @enderror" id="service" name="service" required>
                            <option selected>Choose The service</option>
                            <option value="shortLinkService">Short_Link_Service</option>
                            <option value="fileManagerService">File_Manager_Service</option>
                            <option value="bankCardService">Back_Cards_Service</option>
                            {{-- <option value="Library_Service">Library_Service</option> --}}
                        </select>
                    </div>


                    <div class="modal-footer d-block">

                        <button type="submit" class="btn btn-warning float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
