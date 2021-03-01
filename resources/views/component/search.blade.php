<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Select all keywords that apply to your seach
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="advsearch" method="GET" action="{{route('keyword.result')}}">
            @csrf
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <select multiple class="form-control" id="keywords" name="keywords[]">
                  @foreach($keywords as $key)
                    <option value="{{$key->keyword_id}}">{{$key->keyword_name}}</option>
                  @endforeach
                </select>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="advsearch" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
</div>
