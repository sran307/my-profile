@extends("layout")
@section("title")
Amount saved
@endsection
@section("content")
<section class="spacing">
    <h1 class="values-only">Total amount saved : {{$saving}}</h1>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection