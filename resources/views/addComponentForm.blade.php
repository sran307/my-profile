@extends("layout")
@section("title")
Add component
@endsection
@section("content")
<section class="spacing">
    <form action="/adding_component" method="POST">
    @csrf
        <input type="text" name="component_id" placeholder="Enter Component id" value="{{$id}}" readonly>
        <input type="text" name="component_name" placeholder="Enter component name" value="{{$name}}" readonly>
        <input type="text" name="component_value" placeholder="Enter component value">
        <input type="text" name="component_rating" placeholder="Enter component rating">
        <input type="text" name="component_price" placeholder="Enter component price">
        <input type="text" name="component_quantity" placeholder="Enter component quantity">
        <button type="submit">Submit</button>
    </form>
    <a href="/add_component"><button>Go Back</button>
</section>
@endsection