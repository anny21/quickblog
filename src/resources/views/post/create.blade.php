<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <link rel="stylesheet" href="{{asset('assets/custom.css')}}">
</head>

<body>
  <div class="container" style="margin-top: 5%">
    <div class="row">
      <div class="col-md-8">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{route('create-post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" name="banner" onchange="loadFile(event)" class="form-group" id="">

            <label for="title">Blog Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title"
              aria-describedby="titleHelp" placeholder="Enter Blog Title">
            <small id="titleHelp" class="form-text text-muted">Please enter your blog title</small>
          </div>
          <div class="form-group">
            <label for="body">Blog Body</label>
            <textarea class="form-control" id="body" name="body">{{old('body')}}</textarea>


          </div>
          {{-- <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-md-4 right-panel">
        <div class="cover-photo">
          <h2>Cover photo</h2>
          <h6 id="photo">No photo chosen</h6>
          <img id="output" src="{{old('banner')}}" name="banner" style="width:50%;" />

        </div>
        <div style="height:150px; overflow-y:scroll">
          <h3>Categories</h3>
          @forelse($categories as $category)
          <input type="checkbox" id="{{$category->slug}}" name="categories[]" value="{{$category->masked}}">
          <label for="{{$category->slug}}"> {{$category->name}}</label><br>
          @empty
          <h6>No categories yet</h6>
          @endforelse
        </div>
        <div style="height:150px; overflow-y:scroll">
          <h3>Tags</h3>

          @forelse($tags as $tag)
          <input type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->name}}">
          <label for="{{$tag->slug}}"> {{$tag->name}}</label><br>
          @empty

          @endforelse
        </div>


      </div>
    </div>

    </form>
  </div>

  <script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      var text = document.getElementById('photo').textContent = '';;

      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };

    $(document).ready(function() {
  $('#body').summernote();
});
  </script>
</body>

</html>