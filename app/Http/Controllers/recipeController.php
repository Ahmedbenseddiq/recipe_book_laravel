<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
        return view('recipe.index', ['recipes' => $recipes]);
    }

    public function singleRecipe($id){
        $recipe = Recipe::find($id);
    
        if (!$recipe) {
            // Handle the case when the recipe is not found
            return redirect()->route('recipe.index')->with('error', 'Recipe not found');
        }
    
        return view('recipe.singleRecipe', ['recipe' => $recipe]);
    }
    

    public function create(){
        return view('recipe.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'recipe_name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $data['image'] = $imagePath; 
        }

        $newRecipe = Recipe::create($data);

        return redirect()->route('recipe.index');
    }

    public function edit(Recipe $recipe){
        return view('recipe.edit', ['recipe' => $recipe]);
    }

    public function update(Request $request, Recipe $recipe){
        $data = $request->validate([
            'recipe_name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }

            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $data['image'] = $imagePath; 
        }

        $recipe->update($data);
        return redirect(route('recipe.index'))->with('success', 'Recipe updated successfully');
    }


    public function destroy(Recipe $recipe){
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }
        $recipe->delete();
        return redirect(route('recipe.index'))->with('success', 'Recipe deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipesQuery = Recipe::query();

        if ($query) {
            $recipesQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('recipe_name', 'like', '%' . $query . '%');
            });
        }

        $recipes = $recipesQuery->get();
        return view('recipe.index', compact('recipes'));
    }
}
