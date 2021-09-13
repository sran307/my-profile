@extends("layout")
@section("title")
Chitty amount paid 
@endsection
@section("content")
<section class="spacing">
    <h1 class="values-only">total chitty amount you paid is {{$data}} rupees.</h1>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection