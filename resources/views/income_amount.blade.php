
@extends("layout")
@section("title")
Income Amount
@endsection
@section("content")
<section class="spacing">
    <form action="/income_amount_form" method="POST">
        @csrf
        <input type="text" name="date_id" placeholder="Enter your date id" value="{{$data}}" readonly>
        <input type="date" name="date" value="{{$date}}" readonly>
        <input type="text" name="income_source" placeholder="Enter your Income Source">
        <input type="text" name="amount" placeholder="Enter the amount">
        <button type="submit">Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection