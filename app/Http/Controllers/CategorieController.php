<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){        
        $object = ModelName::latest()->get();   
        return view('articles.index',['articles' => $object]);             
    }
    public function show($id){     
        $object = ModelName::findOrFail($id);   
        return view('articles.show',['article' => $object]);              
    }

    public function create(){       
       return view('articles.create');                                     
    }
    
    public function store(){ 
     
    
       request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
    ]);

       $object = new ModelName();
       
       $object ->title = request('title');
       $object ->excerpt = request('excerpt');
       $object ->body = request('body');
       
       $object ->save();

       return redirect ('/articles');
       

    }
      
    public function edit($id){ 
        
        $object = ModelName::find($id);
        return view('articles.edit', ['article' => $object]);
    }
      
    public function update($id){
        $object = ModelName::find($id);
        $object ->title = request('title');
        $object ->excerpt = request('excerpt');
        $object ->body = request('body');
        
        $object ->save();
       return redirect ( route('articles.show', $object->id));
        //or return redirect('/articles/'. $object->id);
        //or return redirect('/articles/'. $id);
        
    }
      
    public function destroy($id){
       //dd('hello');

       ModelName::find($id)->delete();

       return redirect ('/articles');
    }
}
