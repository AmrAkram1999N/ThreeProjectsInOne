<a class="btn btn-sm btn-outline-secondary " type="button" data-bs-toggle="modal" href="#exampleModalToggle3"
    role="button">
    <span class="text-warning" data-feather="folder-plus"></span>
    Create_File
</a>


<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-warning" id="exampleModalToggleLabel">Creating a new file</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route('Chain.Account.Auth.Create_File', $folder) }}" method="POST">
                        @csrf
                        <div class="row gutters">
                            <div class="mb-1">
                                <label class="form-label ms-1 fs-6 fw-bold">File Name</label>
                                <input type="text" name="file_name"
                                    class="form-control @error('file_name') is-invalid  @enderror "
                                    placeholder="Enter the name of folder" value="{{ old('file_name') }}" required
                                    autofocus>
                                @error('file_name')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Type of File</label>
                                <select class="form-select mb-0 @error('file_type') is-invalid @enderror" id="service"
                                    name="file_type" required>
                                    <option selected>Choose The Type of File</option>
                                    <option value="txt">txt</option>
                                    <option value="doc">doc</option>
                                    <option value="docx">docx</option>
                                    <option value="PDF">pdf</option>
                                </select>
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
