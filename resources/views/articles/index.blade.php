@extends('articles.layout')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Articles</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create new article</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->article_id }}</td>
            <td>{{ $article->article_topic }}</td>
            <td>{{ $article->article_description }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->article_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
   
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                <a class="btn btn-info" href="{{ route('articles.show',$article->article_id) }}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('articles.edit',$article->article_id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articles->links() !!}
      
@endsection