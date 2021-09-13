@extends("layout")
@section("title")
credit
@endsection
@section("content")
<section class="spacing">
    <form action="/credit_form" method="POST">
        @csrf
        <input type="date" name="date">
        <button type="submit">Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection