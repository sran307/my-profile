@extends("layout")
@section("title")
Loan
@endsection
@section("content")
<section class="spacing">
    <form action="/loan_form" method="POST">
    @csrf
        <input type="date" name="date">
        <input type="text" name="amount" placeholder="Enter your loan amount">
        <button type="submit">Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection