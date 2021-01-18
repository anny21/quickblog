<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category|Edit</title>
    


</head>
<body>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('category.update', $category->masked)}}" method="post">
        @csrf

    @method('patch')

  
        <input type="text" name="name" value="{{$category->name}}">
        
     
<input type="submit" value="Update Post">
</body>
</html>