@extends ('layouts/app')

@section ('content')

	
</div>
<div>
  <form action="/admin/categories/create" method="POST">
    @csrf
<h2>create a category</h2>

  <label for="categories">  Category Name</label>
    <input id="categories" type="text" class=" @error('categories') is-invalid @enderror" name="categories" required autocomplete="categories">
      
    @error('categories')
        <span class="" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
 
  <button type="submit"> create category</button>
</form>
</div>
<div id="wrapper">
   
    <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>Category name</th>
          <th>options</th>
        </tr>
    
    
@foreach ($categories as $category)

    <tr> 
      <form action="/admin/categories/update/{{ $category->product_categoryid}}" method="POST">
      @csrf
      @method('put')

        <td>{{ $category->product_categoryid}}</td>

        <td>  <input id="categories" type="text" class=" @error('categories') is-invalid @enderror" name="categories" required autocomplete="categories" value="{{ $category->categories}}">

          @error('categories')
              <span class="" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror</td>
       
        <td>

          <button type="submit">change category name </button>
        </form>
          <form  action="/admin/categories/delete/{{ $category->product_categoryid}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">delete </button>
          </form>
           
        </td>
      </tr>
	
@endforeach
	</div>
    
</div>

@endsection