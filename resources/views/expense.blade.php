@extends("layout")
@section("title")
Expense amount
@endsection
@section("content")
<section class="spacing">
    <form action="/expense_form" method="POST">
        @csrf
        <input type="date" name="date">
        <button type="submit">submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection