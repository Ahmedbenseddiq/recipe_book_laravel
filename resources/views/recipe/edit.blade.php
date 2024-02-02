<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>

       


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Recipe Book</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <!-- <a href="index.html" class="nav-item nav-link">Back Home</a> -->
                        </div>
                        <div class="d-flex m-3 me-0">
                            <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a> -->
                            <a href="{{route('recipe.index')}}" class="nav-item nav-link">Back Home</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all as $error )
                                <li>{($error)}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <form action="{{route('recipe.update', $recipe->id)}}" method="post">
                    @csrf

                    <label for="recipe_name" class="visually-hidden">Recipe Name</label>
                    <input type="text" id="recipe_name"  name ="recipe_name" class="form-control mb-5" placeholder="Recipe Name" value="{{$recipe->recipe_name}}">
                
                    <label for="recipe_description" class="visually-hidden">Description</label>
                    <input id="recipe_description" name="description" class="form-control mb-5" placeholder="Description" value="{{$recipe->description}}"></textarea>
                
                    <label for="recipe_ingredients" class="visually-hidden">Ingredients</label>
                    <input id="recipe_ingredients" name="ingredients" class="form-control mb-5" placeholder="Ingredients" value="{{$recipe->ingredients}}"></input>
                
                    <!-- <label for="recipe_image" class="visually-hidden">Recipe Image</label>
                    <!-- <input type="file" id="recipe_image" name="image" accept="image/*" class="form-control mb-5">  -->
                
                    <button type="update" class="btn btn-success">Update Recipe</button>
                </form>
                
            </div>
        </div>        

              
        

    </body>

</html>