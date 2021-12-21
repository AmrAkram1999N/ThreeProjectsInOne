<a class="btn btn-sm btn-outline-secondary font-weight-bold text-black w-100" type="button" data-bs-toggle="modal" href="#exampleModalToggle"
    role="button">
    <span class="text-danger"  data-feather="upload"></span>
    Upload_New_File
</a>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-danger" id="exampleModalToggleLabel">Uploading a New Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <div class="card-body">
                    <form action="{{ route('Chain.Account.Auth.Upload', $path) }}" method="POST" files="true" accept="image/* , files/*, audio/* .pdf, .doc, .docx" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row gutters">
                            <div class="mb-3">
                                <label class="form-label ms-1 fs-6 fw-bold">Upload File</label>
                                <input type="file" name="file_request[]"
                                    class="form-control mb-0 @error('file_request') is-invalid  @enderror "
                                    placeholder="Your file" value="{{ old('file_request') }}" required autofocus multiple>
                                @error('file_request')
                                    <small class="text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-1">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-warning">+Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
