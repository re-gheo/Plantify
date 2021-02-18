@extends('layouts.admin-template')
  
@section('content')

<div class="container ">
    <div class="row px-4 mx-auto">
        <div class="col-lg-10 col-xl-10 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
            <div class="card-body mx-auto">
                <div >
                    <h2 class="card-text text-center">Create New Article</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Warning!</strong> Please check your input code<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                   
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                <input type="text" name="article_topic" class="form-control" placeholder="Title" id="title">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <textarea class="form-control" style="height:280px" name="article_description" placeholder="Description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-block btn-success text-uppercase text-white">Submit</button>
                                <a class="btn btn-block btn-primary mt-2" href="{{ route('articles.index') }}"> Back</a>
                        </div>
                    </div>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          
        </div>
        <div class="pull-right">
           
        </div>
    </div>
</div>
   

@endsection