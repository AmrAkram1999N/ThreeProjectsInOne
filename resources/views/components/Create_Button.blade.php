<a class="btn btn-sm btn-outline-secondary font-weight-bold mt-1 text-black w-100" type="button" data-bs-toggle="modal" href="#exampleModalToggle1"
    role="button">
    <span class="text-warning"  data-feather="folder-plus"></span>
    Create_New_Folder
</a>


<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-warning" id="exampleModalToggleLabel">Creating a new folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <div class="card-body">
                    <form action="{{ route('Chain.Account.Auth.Create_Folder', $folder) }}" method="POST">
                        @csrf
                        <div class="row gutters">
                            <div class="mb-1">
                                <label class="form-label ms-1 fs-6 fw-bold">Folder Name</label>
                                <input type="text" name="folder_name"
                                    class="form-control @error('folder_name') is-invalid  @enderror "
                                    placeholder="Enter the name of folder" value="{{ old('folder_name') }}" required autofocus>
                                @error('folder_name')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-1">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-warning">+Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
