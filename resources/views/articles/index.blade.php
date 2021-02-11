@extends('layouts.admin-template')
@section('content')

<div class="row">
        <div class="col-lg-10 mr-auto ml-auto">
            <div class="pull-left">
             
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create new article</a>
            </div>
        </div>     
        <div class="container ">
            <h2>Check all Articles</h2>
            <div class="card-body table-responsive-sm">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
           
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
              
                @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->article_id }}</td>
                    <td>{{ $article->article_topic }}</td>
                    <td>{{ $article->article_description }}</td>
                    <div >
                        <td class="float-right">
                            <form class="col-sm-3 my-auto float-right" action="{{ route('articles.destroy',$article->article_id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                
                             

                            </form>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a class="btn btn-info" href="{{ route('articles.show',$article->article_id) }}">Show</a>
                
                            <a class="btn btn-warning" href="{{ route('articles.edit',$article->article_id) }}">Edit</a>
                        </td>
                    </div>
                  
                </tr>
                @endforeach
            </table>
          
            {!! $articles->links() !!}
            </div>
        </div>
    </div>
   
   






      
@endsection