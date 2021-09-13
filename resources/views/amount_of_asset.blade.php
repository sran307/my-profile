@extends("layout")
@section("title")
Assets
@endsection
@section("content")
<section class="spacing">
    <h1 class="values-only">Your total asset amount is {{$asset_amount}} indian rupees</h1>
    <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection