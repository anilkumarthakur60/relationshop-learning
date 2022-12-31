<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

<form action="{{route('tag.store')}}" method="post">
	
	{{csrf_field()}}
	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<!-- HTML -->
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="image_label">Image</label>
            <div class="input-group">
                <input type="text" id="image1" class="form-control" name="image"
                       aria-label="Image" aria-describedby="button-image">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="image_label">Image2</label>
            <div class="input-group">
                <input type="text" id="image2" class="form-control" name="image"
                       aria-label="Image" aria-describedby="button-image">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-image2">Select</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->

</form>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
<script>
    new Vue({
        el: '#app'
    })
    document.addEventListener("DOMContentLoaded", function () {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
    
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image1';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    // second button
    document.getElementById('button-image2').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image2';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });
  });

  // input
  let inputId = '';

  // set file link
  function fmSetLink($url) {
    document.getElementById(inputId).value = $url;
  }
</script>