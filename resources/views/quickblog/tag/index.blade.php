<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    


</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-md-4">
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('create-tag')}}" method="post">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control" name="name">
    
  
</div>
<input type="submit" class="btn btn-primary" value="Create Tag">
<div class="form-group"></div>
    </form>
</div>

<div class="col-md-8">
    <table class="table table-bordered">
    <tr>
        <th>Tag</th>
        <th>Slug</th>
        <th>Action</th>
        </tr>
    @forelse($tags as $tag)
    
      <tr>
          <td> {{$tag->name}}</td>
          <td> {{$tag->slug}}</td>

          <td><a href="{{route('tag.edit', $tag->masked)}}">Edit</a>
            <form action="{{route('tag.delete', $tag->masked)}}" method="post">
                @csrf @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete"></form></td>
      </tr>
           
      
      
    @empty

    @endforelse
</table>
</div>
</div>
</body>
</html>