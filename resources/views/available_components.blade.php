@extends("layout")
@section("title")
availability
@endsection
@section("content")
<section class="spacing">
    <p class="values-only">the available component is {{$available}}.</p>
    <p class="values-only"> the total component price is {{$price}} rupees</p>
    <a href="/availability"><button>Go back</button></a>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection