@extends("layout")
@section("title")
Update Salary
@endsection
@section("content")
    {{--update modal--}}
    <section class="spacing">
        <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update salary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_modal_form">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Customer Id:</label>
                        <input type="text" class="form-control" id="customer_id">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                        <ul class="my-2" id="error_ul"></ul>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary update_salary">Update salary</button>
            </div>
            </div>
        </div>
        </div>

            {{--end updatemodal--}}
            <table class="table table-bordered">
                <thead class="table-head">
                    <tr>
                        <th>customer id</th>
                        <th>customer name</th>
                        <th>amount to be paid</th>
                        <th>amount paid</th>
                        <th>update</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    
                </tbody>
            </table>
            <h4 id="page-message"></h4>
            <ul id="success_ul"></ul>
            <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
    </section>
@endsection
