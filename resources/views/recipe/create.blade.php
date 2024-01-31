<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="m-auto">
        <h1>create recipe</h1>
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all as $error )
                        <li>{($error)}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{route('recipe.store')}}" method="post">
            @csrf
            @method('post')
            <div>
                <label for="">name</label>
                <input type="text" name = recipe_name placeholder="recipe name">
            </div>
            <div>
                <label for="">description</label>
                <input type="text" name = description placeholder="add a description">
            </div>
            <div>
                <label for="">ingredients</label>
                <input type="text" name = ingredients placeholder="ingredients">
            </div>
            <div>
                <input type="submit"  value = add>
            </div>
    </div>        
</body>
</html>