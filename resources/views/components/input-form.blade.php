
<a class="get-started-btn scrollto"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" >
    <i class="fa fa-fw fa-camera"></i>
    <span>Change Photo </span>
</a>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalToggleLabel">Upload a new photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route($routeImage) }}" method="POST" accept="image/*" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">

                        <input type="file" class="form-control" name="photo" required>

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
