<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    public function index(){   
          
        $categorie = Categorie::latest()->get();   
        return view('admin.category.index',['categories' => $categorie]);                 
    }
    public function show($id){     
        $categorie = Categorie::findOrFail($id);   
        return view('categories.show',['categorie' => $categorie]);              
    }

    public function create(){       
       return view('categories.create');                                     
    }
    
    public function store(){ 
     
    
    //    request()->validate([
    //     'title' => 'required',
    //     'excerpt' => 'required',
    //     'body' => 'required'
    // ]);

       $categorie = new Categorie();
       
    //    $categorie ->title = request('title');
    //    $categorie ->excerpt = request('excerpt');
    //    $categorie ->body = request('body');
       
       $categorie ->save();

    //    return redirect ('/categories');
       

    }
      
    public function edit($id){ 
        
        $categorie = Categorie::find($id);
        return view('categories.edit', ['categorie' => $categorie]);
    }
      
    public function update($id){
        $categorie = Categorie::find($id);
        $categorie ->title = request('title');
        $categorie ->excerpt = request('excerpt');
        $categorie ->body = request('body');
        
        $categorie ->save();
       return redirect ( route('categories.show', $categorie->id));
        //or return redirect('/categories/'. $categorie->id);
        //or return redirect('/categories/'. $id); 
        
    }
      
    public function destroy($id){
       //dd('hello');

       Categorie::find($id)->delete();

       return redirect ('/categories');
    }
}
