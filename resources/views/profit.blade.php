@extends("layout")
@section("title")
Profit
@endsection
@section("content")
<section class="spacing">
    <h1 class="values-only">Your profit is only {{$profit}} indian rupees.</h1>
    <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection