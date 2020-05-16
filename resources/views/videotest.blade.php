@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="form-group mt-5 text-center text-md-left">
                <label class="d-md-none rounded-pill btn btn-primary" for="tumbnail">upload custom thumbnail</label>
                <label class="d-none d-md-block" for="tumbnail">Upload custom thumbnail</label>
                <label class="d-none w-50 add-btn d-md-flex justify-content-center align-items-center edit-tumbnail" ondrop="drop(event)" ondragover="allowDrop(event)" for="tumbnail">
                    <img src="/images/add.svg" alt="Add icon">
                </label>
                <input name="tumbnail" type="file" class="form-control-file position-static" id="tumbnail" required>
            </div>
        </div>
    </div>
</div>

<script>
    function dragStart(event) {
        //event.dataTransfer.setData("Text", event.target.id);
        //document.getElementById("demo").innerHTML = "Started to drag the p element";
    }

    function allowDrop(event) {
        event.preventDefault();
    }   

    function drop(event) {
        event.preventDefault();
        
        /*var reader = new FileReader();
        reader.onload = function () {
            $('.edit-tumbnail').css('background-image', 'url(' + reader.result + ')');
        };
        reader.readAsDataURL(event.target.files[0]);*/

        alert('dropped');
    }
</script>
@endsection