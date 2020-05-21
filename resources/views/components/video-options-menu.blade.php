<div class="position-fixed video-options-menu pb-4 d-md-none">
    <div class="row pt-3">
        <div class="col-12">
            <a class="text-decoration-none edit-video text-white px-4 pb-3" href=""><i class="text-white mr-2 fa fa-pencil" aria-hidden="true"></i>edit video</a>
        </div>

        <div class="col-12">
            <input type="hidden" value="{{ \Route::current()->parameter('id') }}">
            <input type="hidden" value="">
            <span class="delete-video btn btn-primary text-white px-4 py-3"><i class="text-white mr-2 fa fa-trash" aria-hidden="true"></i>delete video</span>
        </div>

        <div class="col-12">
            <span class="text-white px-4 py-3 cancel-btn"><i class="text-white mr-2 fa fa-times"></i>cancel</span>
        </div>
    </div>
</div>