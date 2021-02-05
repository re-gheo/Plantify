@extends ('layouts/app')

@section ('content')

	
</div>
<div id="wrapper">
   
    <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>options</th>
        </tr>
    
    
@foreach ($users as $user)

	
   
    <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
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