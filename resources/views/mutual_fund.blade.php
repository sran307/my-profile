@extends("layout")
@section("title")
Mutual fund
@endsection
@section("content")
<section class="spacing">
    <div class="modal fade" id="mutual_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">mutual funds</h5>
                <button type="button" class="close btn-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Fund Name:</label>
                    <input type="text" class="form-control " id="fund-name">
                    <div>
                        <ul id="error_ul1" class="error_ul my-2"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Start Date:</label>
                    <input type="date" class="form-control" id="start-date">
                    <div>
                        <ul id="error_ul2" class="error_ul my-2"></ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Investment type:</label>
                    <select name="investment_type_data" id="investment-type">
                        <option value="sip">SIP</option>
                        <option value="one time">One Time</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Invested Amount:</label>
                    <input type="text" class="form-control" id="invested-amount">
                    <div>
                        <ul id="error_ul3" class="error_ul my-2"></ul>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-style" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-style add-mutual">ADD YOUR FUND</button>
            </div>
            </div>
        </div>
    </div>
    {{--update-modal--}}
    <div class="modal fade" id="update_mutual_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">Update mutual funds</h5>
                <button type="button" class="close btn-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Fund Name:</label>
                    <input type="text" class="form-control fund-name" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Start Date:</label>
                    <input type="date" class="form-control start-date" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Investment type:</label>
                    <input type="text" class="form-control investment-type" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Installment Amount:</label>
                    <input type="text" class="form-control installment-amount">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-style" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-style update-mutual">UPDATE AMOUNT</button>
            </div>
            </div>
        </div>
    </div>
    {{--delete-modal--}}
    <div class="modal delete_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">MUTUAL FUNDS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>ARE YOU SURE TO DELETE THIS FUND?</p>
                    <input type="text" class="fund-id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete_mutual_button">DELETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="d-inline-block">mutual funds</h4>
                        <input type="text" class="mx-5" readonly id="total_mutual_fund">
                            <a href=""data-toggle="modal" data-target="#mutual_modal" class="btn btn-primary float-right btn-sm btn-style">add mutualfund</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>sl.no</th>
                                    <th>Mutual fund name</th>
                                    <th>Started date</th>
                                    <th>Type</th>
                                    <th>Total amount invested</th>
                                    <th>Update amount</th>
                                    <th>Delete mutual fund</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul id="success_ul" class="my-2"></ul>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection
