@extends("layout")
@section("title")
customer bill
@endsection
@section("content")
<section class="spacing">
    <form action="/salary" method="POST">
    @csrf
        <input type="text" name="customer_id" placeholder="Enter customer id" value="{{$new_id}}" readonly>
        <input type="date" name="date">
        <input type="text" name="customer_name" placeholder="Enter customer name">
        <input type="text" name="component_price" placeholder="Enter component price">
        <input type="text" name="rate" placeholder="Enter your rate">
        <input type="text" name="total_amount" placeholder="Enter total amount">
        <input type="text" name="amount_got" placeholder="Enter the amount you got">
        <button type="submit">Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection