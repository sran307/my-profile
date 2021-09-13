@extends ("layout")
@section("title")
Registration
@endsection
@section("content")
<section id="registration">
        <div class="container">
            <form action="registration_form" method="post">
                @csrf 
                <legend class="col-form-label">Registration Form</legend>
                <div class="row form-group">
                    <label for="name" class="col-form-label col-sm-2">Name</label>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your first name" id="first_name" name="first_name" pattern="[a-z A-Z]+">
                    </div>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" pattern="[a-z A-Z]+">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-2">Email Id</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter your email id" name="email">
                        <div>
                            <p id="email_message"></p>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="phone_number" class="col-form-label col-sm-2">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" placeholder="Enter your mobile number" name="mobile_number" pattern="[0-9]{10}">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="country" class="col-form-label col-sm-2">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter your country" name="country" pattern="[a-z A-Z]{3,}">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="gender" class="col-form-label pt-0">Gender</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" value="male">
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="interest">Interests</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="movies">
                                <label class="form-check-label" for="movies">Movies</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="music">
                                <label for="music" class="form-check-label">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="books">
                                <label for="books" class="form-check-label">Books</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="games">
                                <label for="games" class="form-check-label">Games</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="travel">
                                <label for="travel" class="form-check-label">Travel</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row form-group">
                    <label for="job" class="col-sm-2 col-form-label">Job Title</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="job">
                            <option>Self employed</option>
                            <option>Employee</option>
                            <option>Employer</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="user_id" class="col-form-label col-sm-2">User Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Create your user id" name="user_id" pattern="[a-z A-Z 0-9]+">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Create your password" name="password" pattern="[a-z A-Z 0-9]{8,}">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="confirm_password" class="col-form-label col-sm-2">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Confirm your password" name="confirm_password" pattern="[a-z A-Z 0-9]{8,}">
                    </div>
                </div>
                <fieldset class="text-center">
                    <button type="submit" class="register-button">Register</button>
                </fieldset>
            </form>
        </div>
    </section>
@endsection