<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>recipes</h1>
    <div>
        <table border="1">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>ingredients</th>

            </tr>
            @foreach ($recipes as $recipe)
            <tr>
               <td>{{ $recipe->id}}</td>
               <td>{{ $recipe->recipe_name}}</td>
               <td>{{ $recipe->description}}</td>
               <td>{{ $recipe->ingredients}}</td>
            </tr>   
            @endforeach
            
            
        </table>
    </div>
</body>
</html> 