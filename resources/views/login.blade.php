@extends("layout")
@section("title")
Login
@endsection
@section("content")
<section id="login">
        <div class="container">
            <form action="/login_form" method="post">
            @csrf
                <legend class="col-form-label">Login</legend>
                <fieldset class="form-group fontuser">
                    <input type="text" placeholder="Enter your User Id or Email Id" name="user_id" class="form-control col-lg-6" required>
                    <i class="fa fa-user fa-lg"></i>
                </fieldset>
                <fieldset class="form-group fontpass">
                    <input type="password" placeholder="Enter your password" name="password" class="form-control col-lg-6" required>
                    <i class="fa fa-key fa-lg"></i>
                </fieldset>
                <fieldset>
                    <input type="checkbox" name="check" value="agree" required>
                    <label> I agree terms and conditions</label>
                </fieldset>
                <fieldset class="form-group text-center">
                    <button type="submit">Login</button>
                </fieldset>
            </form>
            <div class="container">
                @if(session()->has("error_message"))
                <div class="alert alert-danger">
                    {{session()->get("error_message")}}
                </div>
                @endif
        </div>
    </section>

@endsection