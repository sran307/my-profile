@extends ("layout")
@section("title")
Change password
@endsection
@section("content")
    <section class="spacing">
        <form action="/new_password" method="post">
        @csrf
            <div class="d-flex flex-column align-items-center">
                <label for="password" class="col-form-label">Enter your password:</label>
                <input type="password" class="form-control col-md-6" name="password">

                @error("password")
                <small class="alert alert-danger my-3">{{$message}}</small>
                @enderror
                <label for="new_password" class="col-form-label">Enter your new password</label>
                <input type="password" class="form-control col-md-6" name="new_password">
                @error("new_password")
                <small class="alert alert-danger my-3">{{$message}}</small>
                @enderror
                <label for="confirm_new_password" class="col-form-label">Confirm your password</label>
                <input type="password" class="form-control col-md-6" name="confirm_new_password">
                @error("confirm_new_password")
                <small class="alert alert-danger my-3">{{$message}}</small>
                @enderror
                <button type="submit" class="my-3">Submit</button>
                @if(session()->has("error_message"))
                <div class="alert alert-danger">
                    {{session()->get("error_message")}}
                </div>
                @endif
            </div>
        </form>
    </section>
@endsection