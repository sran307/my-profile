@extends("layout")
@section("title")
Loan
@endsection
@section("content")
<section class="spacing values-only">
    <h1>Total number of months paid : {{$data1}}</h1>
    <h1>Total number of months not paid : {{$data2}}</h1>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection