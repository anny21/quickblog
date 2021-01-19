<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category|Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    


</head>
<body>
    <div class="row container">
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
    <form action="{{route('create-category')}}" method="post">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control" name="name">
    
  
<input type="submit" value="Create Category">
</div>
</div>

<div class="col-md-8">
    <table class="table table-bordered">
    <tr>
        <th>Category</th>
        <th>Slug</th>
        <th>Action</th>
        </tr>
    @forelse($categories as $category)
    
      <tr>
          <td> {{$category->name}}</td>
          <td> {{$category->slug}}</td>

          <td><a href="{{route('category.edit', $category->masked)}}">Edit</a>
            <a href="{{route('category.show', $category->masked)}}">Read More</a></td>
      </tr>
           
      
      
    @empty

    @endforelse
</table>
</div>
</body>
</html>