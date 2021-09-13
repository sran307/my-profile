@extends("layout")
@section("title")
Expense amount
@endsection
@section("content")
<section class="spacing">
    <form action="/expense_amount_form" method="POST">
        @csrf
        <input type="text" name="date_id" placeholder="enter the id of your date" value={{$id}} readonly>
        <input type="date" name="date" value={{$date}} readonly>
        <input type="text" name="reason" placeholder="Enter your Expense reason">
        <input type="text" name="amount" placeholder="Enter the amount">
        <button type="submit" >Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection