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
      request()->validate([
        'article_topic'=>['required'],
           'article_description'=>['required']
       ]);
      $article = new Article();
      $article->article_topic = request('article_topic');
      $article->article_description = request('article_description');
        $article->save();
      //dd($article); (test)
       return redirect()->route('articles.index')->with('success', 'Article has been added');
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
      $article = Article::findOrFail($id);
        return view ('articles.show',['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $articles = Article::latest()->paginate(5);
      // dd($articles);
        $article = Article::findOrFail($id);
        // dd($article);

        return view('articles.edit',['article' => $article]);
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

       $article = Article::find($id);
       $article->article_topic = request('article_topic');
       $article->article_description = request('article_description');
       $article->save();
             return redirect()->route('articles.index')->with('success', 'Article has been updated');
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

      return redirect()->route('articles.index')->with('success', 'Article has been deleted');
    }

    public function store_show()
    {
      $articles = Article::where('isDeleted',null)->get();

    return view('articles.store_index', compact('articles'));
    }

     //Sweet Alert AJAX
    // public function delete($article_id)
    // {
    //   $serv_cate = Article::findOrfail($article_id);
    //   $serv_cate->delete();
    //   return response()->json(['status','Entry deleted successfully!']);
    // }
}
