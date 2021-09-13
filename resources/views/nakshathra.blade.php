@extends("layout")
@section("title")
Nakshathra
@endsection
@section("content")
<section class="spacing">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="box">
            <a href="/add_component"><button class="solid-button">Add Component</button></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="box">
                <a href="/update_component"><button class="solid-button">Update Component</button></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="box">
                <a href="/used_component"><button class="solid-button">Number of components taken</button></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="box">
                <a href="/availability"><button class="solid-button">Check Availability</button></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="box">
                <a href="/customer"><button class="solid-button">Customer Bill</button></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="box">
                <a href="/update_salary"><button class="solid-button">Update The Amount You Got</button></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="box">
                <a href="/profit"><button class="solid-button">Profit</button></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="box">
                <a href="/asset"><button class="solid-button">Total Amount Of Assets</button></a>
            </div>
        </div>
    </div>
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif
    @if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
    @endif
</section>
@endsection