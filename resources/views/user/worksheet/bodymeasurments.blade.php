
<form action="/worksheet/updatebodym" method="post" enctype='multipart/form-data'>

    @if(Session::has('success'))
    <div class="alert alert-success my-5" role="alert">
        {{Session::get('success')}}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger my-5" role="alert">
        {{Session::get('error')}}
    </div>
    @endif


    @csrf
    <div class="row py-5 justify-content-between">

        <div class="col-6">
            <div class="mh-40">
                <p class="uppercase">where I am now?</p>
            </div>

            <div class="mh-40">
                <p class="uppercase"></p>
                <input type="text" disabled class="uppercase text-secondary custom-form-input" id="datevalue" name="date" placeholder="date" required>
            </div>

            <div class="mh-40">
                <p class="uppercase"></p>
                <input type="number" class="uppercase text-secondary custom-form-input" id="weight" name="weight" placeholder="weight" required>
            </div>

            <div class="mh-40">
                <p class="uppercase"></p>
                <input type="number" class="uppercase text-secondary custom-form-input" id="height" name="height" placeholder="height" required>
            </div>

            <div class="mh-40">
                <p class="uppercase"></p>
                <input type="number" class="uppercase text-secondary custom-form-input" id="bodyfat" name="bodyfat" placeholder="bodyfat" required>
            </div>

            <div class="bb-bl mh-40"></div>

            <div class="bb-bl"></div>
        </div>

        <div class="col-6">
            <div class="image-container">
                <input type="file" name="image" id="image" accept="image/*" required>
                <label for="image"><img class="hidden-image" id="hidden-image" alt="Your image"></label>
            </div>
        </div>

    </div>

    <div class="row col-12 flex-column">
        <div class="image-container">
            <img class="w-75" src="{{asset('/images/measurments.png')}}">
        </div>

        <div class="bg-brown d-flex justify-content-center align-items-center p-2">
            <p class="text-white text-spacing-bigger uppercase m-0 ts-14">measurements(circumference)</p>
        </div>
    </div>

    <div class="row col-12 p-3">
        <div class="col-6">
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="neck" name="neck" required>
                <label for="neck" class="custom-form-label uppercase">neck</label>
            </div>
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="chest" name="chest" required>
                <label for="chest" class="custom-form-label uppercase">chest</label>
            </div>
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="bicep" name="bicep" required>
                <label for="bicep" class="custom-form-label uppercase">Bicep(flexed)</label>
            </div>
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="waist" name="waist" required>
                <label for="waist" class="custom-form-label uppercase">waist</label>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="hips" name="hips" required>
                <label for="hips" class="custom-form-label uppercase">hips</label>
            </div>
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="thigh" name="thigh" required>
                <label for="thigh" class="custom-form-label uppercase">thigh</label>
            </div>
            <div class="custom-form-group">
                <input type="text" class="custom-form-input" id="calf" name="calf" required>
                <label for="calf" class="custom-form-label uppercase">calf</label>
            </div>
        </div>
    </div>


    <div class="row col-12 p-3 justify-content-end">
        <button type="submit" class="btn btn-transparent">Update</button>
    </div> 

</form>

<script>

$(document).ready( function() {
    var d = new Date();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    date = d.getDate() + "." + d.getMonth() + "." + d.getFullYear();
    $('#datevalue').val(date);
 
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#hidden-image').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string

    $('#hidden-image').removeClass('hidden-image');
    $('#hidden-image').addClass('image-show');
    $('#image').addClass('hidden-image');
  }
}

$("#image").change(function() {
  readURL(this);
});

</script>