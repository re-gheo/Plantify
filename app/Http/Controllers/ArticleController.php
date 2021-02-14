<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles = Article::latest()->paginate(5);

    return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // //  Article::create([
      // //   'article_topic'=>$request->title,
      // //   'article_description'=>$request->description
      //  ]);
      $article = new Article();
      $article->article_topic = request('title');
      $article->article_description = request('description');
        $article->save();
      //dd($article); (test)
       return redirect('/articles')->with('success', 'Article has been added');
       //->route('articles.index')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::latest()->get(); 
        return view('articles.edit',['articles' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      request()->validate([
        'article_topic'=>['required'],
           'article_description'=>['required']
       ]);

       $ref = Article::find($id);
             $ref->article_topic = request('Article_topic');
             $ref->article_description = request('Article_description');

             return redirect('/articles')->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Article::find($id)->delete();

      return redirect('/articles')->with('success', 'Article has been deleted');
    }
}