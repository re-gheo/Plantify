@extends ('layouts/admin-template')

@section ('content')

        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
              <div class="pull-right">
                <a href="/admin/plantreference/create" class="btn btn-dark"> create a reference</a>
              </div>
              
              <div class="container">
                <h3 class="text-center">Plant Reference Table</h3>
              </div>
                <div class="card-body table-responsive-sm">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif
                  <table class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                    
                    <tr>
                    <th>ID</th>
                    <th>scientificname</th>
                    {{-- <th>description</th>
                    <th>maintenance</th> --}}
                    <th>category</th>
                    <th>Photos</th>
                    <th>options</th>                 
                  </tr>
                </thead>

    
                @foreach ($references as $reference)

   
                <tr>
                  <td>{{ $reference->plant_referenceid }}</td>
                  <td>{{ $reference->plant_scientificname }}</td>
                  {{-- <td>{{ $reference->plant_description }}</td>
                  <td>{{ $reference->plant_maintenance }}</td> --}} 
           
                  {{-- NOTSURE IF NEEDED --}}
                  <td>{{ $reference->categories }}</td>
                  <td>
                    <div class="row">
                      <img src="{{url('/storage/'. $reference->plant_photo)  }}" width="150" height="150" alt="main">
                      <img src="{{url('/storage/'. $reference->plant_phototwo)  }}" width="150" height="150" alt="None">
                      <img src="{{url('/storage/'. $reference->plant_photothree)  }}" width="150" height="150" alt="None">
                   </div>
               
                  </td>
                  <td>
                     <div class="row ">
                        <a href="/admin/plantreference/{{$reference->plant_referenceid }}" class="btn btn-dark">EDIT</a>
                        <form action="/admin/plantreference/{{$reference->plant_referenceid }}/delete" method="POST">
                          @csrf
                          @method('delete')
                         <button type="submit" class="btn btn-danger"> Delete </button> {{-- Kenneth Put a warning box here --}}
             
                        </form>
                     </div>
                     <div>
                   
                    </div>
                  </td>
               </tr>
               @endforeach

              </table>
                 </div>

            </div>
       
        </div>
	
</div>
<div> 
	</div>
    
</div>

@endsection