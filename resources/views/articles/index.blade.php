@extends('layouts.admin-template')
@section('content')

    <div class="row">

        <div class="container ">

            {{-- START OF TOGGLE BUTTON --}}
            <div class="">
                <div class="pull-right"> <button id="sidebarCollapse" type="button"
                        class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
                            class="fa fa-bars mr-2"></i><small
                            class="text-uppercase font-weight-bold">Toggle</small></button></div>

            </div>


            {{-- END OF TOGGLE BUTTON --}}

            {{-- START OF CONTENT --}}

            <h2 class="ml-3">Check all Articles</h2>
            <a class="btn btn-success mt-2 ml-3" href="{{ route('articles.create') }}"> Create new article</a>
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
                            <th width="250px">Action</th>
                        </tr>
                    </thead>

                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->article_id }}</td>
                            <td>{{ $article->article_topic }}</td>
                            <div>
                                <td class="d-flex">
                                    <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-2">Delete</button>


                                    </form>
                                    <a class="btn btn-info m-2"
                                        href="{{ route('articles.show', $article->article_id) }}">Show</a>

                                    <a class="btn btn-secondary m-2"
                                        href="{{ route('articles.edit', $article->article_id) }}">Edit</a>
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
