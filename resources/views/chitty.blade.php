@extends("layout")
@section("title")
chitty
@endsection
@section("content")
<section class="spacing">
    <form action="chitty_form" method="POST">
        @csrf
        <input type="date" name="date">
        <input type="text" name="amount" placeholder="Enter your chitty amount">
        <button type="submit">submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection