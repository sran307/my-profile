@extends("layout")
@section("title")
Update component
@endsection
@section("content")
<section class="spacing">
    <form action="component_update_form" method="POST">
        @csrf
        <select name="component_name">
            @foreach($data as $value)
            <option value="{{$value->Components}}">{{$value->Components}}</option>
            @endforeach
        </select>
        <input type="text" name="component_value" placeholder="Enter component value">
        <input type="text" name="component_quantity" placeholder="Enter number of quantity">
        <input type="text" name="component_price" placeholder="Enter component price">
        <button type="submit">Submit</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection