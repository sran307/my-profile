@extends("layout")
@section("title")
Check availability
@endsection
@section("content")
<section class="spacing">
    <!-- In this section, used a drop down which shows the components in our table.
        According to the selection of various components all the details about the item obtained.-->
    <form>
            <select name="component_name" id="component_selection">
                <option value="">select a component from your store</option>
                @foreach($data as $value)
                <option value="{{$value->Components}}">{{$value->Components}}</option>
                @endforeach
            </select>
        </form>
        <div class="my-4">
            <table class="table table-bordered">
                <thead class="table-head">
                    <tr>
                        <th>Component Id</th>
                        <th>Component Name</th>
                        <th>Component Value</th>
                        <th>Component Rating</th>
                        <th>Component Price</th>
                        <th>availability</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="component_table">

                </tbody>
            </table>
        </div>
        <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
        <!-- Modal -->
<div class="modal fade" id="component_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">component update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component Id</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_id" readonly></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component name</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_name" readonly></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component value</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_value"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component rating</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_rating"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component price</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_price"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Component available</label>
                </div>
                <div class="col-md-6"><input type="text" id="component_available"></div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_from_modal">Update</button>
      </div>
    </div>
  </div>
</div>
<!--success and error messages-->
<p class="message"></p>
</section>
        
@endsection