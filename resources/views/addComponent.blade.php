@extends("layout")
@section("title")
Add component
@endsection
@section("content")
    <section class="spacing">
        <form action="/add_component_form" method="POST">
            @csrf
            <input type="text" name="component_name" placeholder="Enter the Component you want to add">
            <button type="submit">Submit</button>
        </form>
        <a href="/nakshathra" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
    </section>
@endsection