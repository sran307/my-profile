@extends("layout")
@section("title")
customer bill
@endsection
@section("content")
<section class="spacing">
    <p class="message my-4"></p>
    <form>
        <input type="text" id="customer_id" placeholder="Enter customer id" value="{{$new_id}}" readonly>
        <input type="date" id="date" required>
        <input type="text" id="customer_name" placeholder="Enter customer name" required>
        <input type="text" id="my_rate" placeholder="Enter your rate" required>
        <input type="text" id="total_amount" placeholder="Enter total amount" required>
        <input type="text" id="amount_got" placeholder="Enter the amount you got" required>
        <button type="submit" id="customer_bill_submit">Submit</button>
    </form>
    <div class="my-4">
        <div id="adding_comp" class="d-none">
            <select id="name_selector">
                <option value="">select a component</option>
            </select>
            <select id="value_selector">
                <option value="">select a value</option>
            </select>
            <select id="rating_selector">
                <option value="">select the rating</option>
            </select>
            <select id="price_selector">
                <option value="">select the price</option>
            </select>
            <input type="text" id="quantity_selector" placeholder="Enter the quantity" required>
        </div>
        <button id="add_comp">Add</button>
    </div>
    <div class="component_table my-4 d-none">
        <table class="table table-stripped">
            <thead class="bg-dark">
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Rating</th>
                    <th>price</th>
                    <th>quantity</th>
                </tr>
            </thead>
            <tbody id="component_table_body"></tbody>
        </table>
    </div>
    <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection