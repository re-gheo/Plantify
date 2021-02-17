@extends ('layouts/admin-template')

@section ('content')

    <div class="row">
      <div class="col-lg-10 mr-auto ml-auto">
        <div class="container">
          <div class="container">
            <h3>Manage user accounts here</h3>
          </div>
          <div class="card-body table-responsive-sm">
            
            <!--SUCESS MESSAGE-->

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

            <!--TABLE-->
            <table class="table table-bordered table-striped table-hover table-responsive-sm">
              <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>options</th>
                </tr>
              </thead>
                                       
              <!--TABLE-->

                  @foreach ($users as $user)

                    
                    
                  <tr>
                      <td>{{ $user->id}}</td>
                      <td>{{ $user->name}}</td>
                      <td>{{ $user->email}}</td>
                    <td>
                            <form  action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger align-center" type="submit">delete </button>

                    </form>
                      </td>
                    </tr>
                   

                  @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>


@endsection