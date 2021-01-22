<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    <div>
        {{$category->name}}

    </div>
    <a href="{{route('category.edit', $category->masked)}}">Edit</a>
    <a href="{{route('category.show', $category->masked)}}">Read More</a>
    </div>
</body>

</html>