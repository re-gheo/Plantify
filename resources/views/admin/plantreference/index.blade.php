@extends ('layouts/app')

@section ('content')

	
</div>
<div>

<a href="/admin/plantreference/create" class="btn btn-dark"> create a reference</a>


</div class="absolute-center">
<div >
   
    <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>scientificname</th>
          {{-- <th>description</th>
          <th>maintenance</th> --}}
          <th>category</th>
          <th>Photos</th>
          <th>options</th>
           
         
        </tr>
    
    
@foreach ($references as $reference)

   
     <tr>
       <td>{{ $reference->plant_referenceid }}</td>
       <td>{{ $reference->plant_scientificname }}</td>
       {{-- <td>{{ $reference->plant_description }}</td>
       <td>{{ $reference->plant_maintenance }}</td> --}} 

       {{-- NOTSURE IF NEEDED --}}
       <td>{{ $reference->categories }}</td>
       <td>
         <div>
           <img src="{{url('/storage/'. $reference->plant_photo)  }}" width="300" height="300" alt="main">
        </div>
         <div>
           <img src="{{url('/storage/'. $reference->plant_phototwo)  }}" width="300" height="300" alt="None">
        </div>
         <div>
           <img src="{{url('/storage/'. $reference->plant_photothree)  }}" width="300" height="300" alt="None">
        </div>
       </td>
       <td>
          <div>
             <a href="/admin/plantreference/{{$reference->plant_referenceid }}" class="btn btn-dark">EDIT</a>
          </div>
          <div>
           <form action="/admin/plantreference/{{$reference->plant_referenceid }}/delete" method="POST">
             @csrf
             @method('delete')
            <button type="submit" class="btn btn-danger"> Delete </button> {{-- Kenneth Put a warning box here --}}

           </form>
         </div>
       </td>
    </tr>
    @endforeach
  </table>

	</div>
    
</div>

@endsection