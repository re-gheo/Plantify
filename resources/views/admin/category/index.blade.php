@extends ('layouts/admin-template')

@section ('content')

	<div class="container">
    <div class="row">
      <div class="col-lg-10 mr-auto ml-auto">
          <div class="pull-right">
            
          </div>

        <div class="card-body table-responsive-sm">
               
          <!--SUCESS MESSAGE-->

          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif


         

          <table class="table table-bordered table-striped table-hover table-responsive-sm">

          <form action="/admin/categories/create" method="POST">
              @csrf
          
              <div class="row">
                <h2><strong>Categories</strong></h2>
              </div>
          

          <div class="row">
            <label class="pr-3" for="categories" >Category Name</label>
            <input class="form-input" id="categories" type="text" class=" @error('categories') is-invalid @enderror" name="categories" required autocomplete="categories">
            <button class="btn btn-success ml-auto " type="submit"> create category</button>
          </div>
          
            
                
              @error('categories')
                  <span class="" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
              <!--TABLE-->
          
          </form>

            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Category name</th>
                <th>options</th>
              </tr>
            </thead>
   
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
                  <div class="form-inline">
                    <button class="btn btn-success pl-auto" type="submit">Edit</button>
                  </form>
                  <form action="/admin/categories/delete/{{ $category->product_categoryid}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger pl-auto" type="submit">delete </button>
                  </form>
                  </div>
                </td>
                 
                  
                   
                
              </tr>
          
        @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
  

@endsection