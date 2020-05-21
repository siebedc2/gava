<div class="position-fixed course-options-menu pb-4 d-md-none">
    <div class="row pt-3">
        <div class="col-12">
            <a class="text-decoration-none edit-course text-white px-4 pb-3" href="/course/edit/{{ $course->id }}"><i class="text-white mr-2 fa fa-pencil" aria-hidden="true"></i>edit course</a>
        </div>

        <div class="col-12">
            <form class="delete-course-form" action="/course/delete/{{ $course->id }}" method="post">
                {{csrf_field()}}
                <input type="hidden" id="courseId" name="courseId" value="{{$course->id}}">
                <button class="delete-btn px-4 py-3 rounded-pill btn btn-primary" type="submit"><i class="text-white mr-2 fa fa-trash" aria-hidden="true"></i>delete course</button>
            </form>
        </div>

        <div class="col-12">
            <span class="text-white px-4 py-3 cancel-btn"><i class="text-white mr-2 fa fa-times"></i>cancel</span>
        </div>
    </div>
</div>