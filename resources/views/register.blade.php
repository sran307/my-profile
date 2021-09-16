@extends ("layout")
@section("title")
Registration
@endsection
@section("content")
{{--In this registration form, I am  using ajax for validation and checking whether the email id and
user name alreaddy taken or not. If it is not taken then data is registered in to the database--}}
<section id="registration">
        <div class="container">
            <form>
                @csrf 
                <legend class="col-form-label">Registration Form</legend>
                <div class="row form-group">
                    <label for="name" class="col-form-label col-sm-2">Name</label>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your first name" id="first_name" name="first_name">
                        <p class="error error_1"></p>
                    </div>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your last name" id="last_name" name="last_name">
                        <p class="error error_2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-2">Email Id</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter your email id" id="email" name="email">
                        <p class="error error_3"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="phone_number" class="col-form-label col-sm-2">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" placeholder="Enter your mobile number" id="mobile_number" name="mobile_number">
                        <p class="error error_4"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="country" class="col-form-label col-sm-2">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter your country" id="country" name="country">
                        <p class="error error_5"></p>
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
                            <p class="error error_6"></p>
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
                            <p class="error error_7"></p>
                        </div>
                    </div>
                </fieldset>
                <div class="row form-group">
                    <label for="job" class="col-sm-2 col-form-label">Job Title</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="job" name="job">
                            <option>Self employed</option>
                            <option>Employee</option>
                            <option>Employer</option>
                            <option>Other</option>
                        </select>
                        <p class="error error_8"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="user_id" class="col-form-label col-sm-2">User Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Create your user id" name="user_id">
                        <p class="error error_9"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Create your password" name="password">
                        <p class="error error_10"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="confirm_password" class="col-form-label col-sm-2">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Confirm your password" name="confirm_password" >
                        <p class="error error_11"></p>
                    </div>
                </div>
                <fieldset class="text-center">
                    <button type="submit" class="register-button">Register</button>
                </fieldset>
            </form>
            <h5 class="success_register"></h5> 
        </div>
    </section>
@endsection