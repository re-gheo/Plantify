@extends ('layouts/app')

@section ('content')

	
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
        <td>{{ $category->product_categoryid}}</td>
        <td>{{ $category->categories}}</td>
       
        <td>
            	<form  action="#" method="POST">
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