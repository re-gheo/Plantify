@extends ('layouts/admin-template')

@section ('content')

        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
            
              
              <div class="container">
                <h3 class="text-center">Applications</h3>
              </div>
                <div class="div class= card-body table-responsive-sm">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif
                  <table class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                    <th>Applications ID</th>
                    <th>Email</th>
                    <th>Application status</th>
                    <th>options</th>
                     
                   
                  </tr>
                </thead>
                @foreach ($apps as $app)

                    <tr>
                        <td>{{ $app->retailer_applicationid }}</td>
                        <td>{{ $app->email }}</td>
                        <td>{{ $app->retailer_approvalstate }}</td>
                        <td>
                            <a href="/admin/customer_application/{{$app->retailer_applicationid}}" class="btn btn-dark">Check</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                 </div>

            </div>
       
        </div>
	
</div>
<div>


</div class="absolute-center">

    
</div>

@endsection