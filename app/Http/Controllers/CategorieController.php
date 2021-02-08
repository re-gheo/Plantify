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
    // public function show($id){     
    //     $categorie = Categorie::findOrFail($id);   
    //     return view('categories.show',['categorie' => $categorie]);              
    // }

    // public function create(){       
    //    return view('categories.create');                                     
    // }
    
    public function store(){ 
     
    
       request()->validate([
        
         'categories' => 'required',
    ]);

       $categorie = new Categorie();
       $categorie ->categories = request('categories');
       $categorie ->save();
       return redirect ('/admin/categories');
    } 
    // public function edit($id){ 
    //     $categorie = Categorie::find($id);
    //     return view('categories.edit', ['categorie' => $categorie]);
    // }
      
    public function update($id){

        //$categorie = Categorie::where('product_categoryid',$id )->first();
        $categorie = Categorie::find($id);
        $categorie ->categories = request('categories');
        $categorie ->save();
        return redirect ( '/admin/categories');
       //return redirect ( route('/admin/categories', $categorie->id));
        //or return redirect('/categories/'. $categorie->id);
        //or return redirect('/categories/'. $id); 
        
    }
      
    public function destroy($id){
       //dd('hello');

       Categorie::find($id)->delete();

       return redirect ('/admin/categories');
    }
}
