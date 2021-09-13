@extends("layout")
@section("title")
Check availability
@endsection
@section("content")
<section class="spacing">
    <form action="/check_availability" method="POST">
        @csrf
            <select name="component_name">
                @foreach($data as $value)
                <option value="{{$value->Components}}">{{$value->Components}}</option>
                @endforeach
            </select>
            <input type="text" name="component_value" placeholder="Enter component value">
            <input type="text" name="component_rating" placeholder="Enter component rating">
            <button type="submit">Submit</button>
            
        </form>
        
        <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>

        @if(session()->has('error_message'))
        <div class="alert alert-success">
            {{ session()->get('error_message') }}
        </div>
        @endif
</section>
        
@endsection