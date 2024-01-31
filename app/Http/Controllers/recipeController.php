<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\recipe;






class recipeController extends Controller
{
    //
    public function index(){
        $recipe = recipe::all();
        return view('recipe.index', ['recipes' => $recipe]);
    }

    public function create(){
        return view('recipe.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'recipe_name' =>'required',
            'description' =>'required',
            'ingredients' =>'required'
        ]);


    $newRecipe = recipe :: create ($data);
    
    return redirect()->route('recipe.index');
    }
}
