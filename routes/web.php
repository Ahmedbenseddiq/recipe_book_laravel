<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\recipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipe', [recipeController::class, 'index'])->name('recipe.index');

Route::get('/recipe/create', [recipeController::class, 'create'])->name('recipe.create');

Route::post('/recipe', [recipeController::class, 'store'])->name('recipe.store');

Route::get('/recipe/{recipe}/edit', [recipeController::class, 'edit'])->name('recipe.edit');

Route::post('/recipe/update/{recipe}', [recipeController::class, 'update'])->name('recipe.update');

Route::delete('/recipe/destroy/{recipe}', [recipeController::class, 'destroy'])->name('recipe.destroy');

Route::get('/recipe/singleRecipe/{recipe}', [recipeController::class, 'singleRecipe'])->name('recipe.singleRecipe');

Route::get('/recipes/search', [RecipeController::class, 'search'])->name('search');