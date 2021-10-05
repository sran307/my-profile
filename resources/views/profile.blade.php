@extends("layout")
@section("title")
profile
@endsection
@section("content")
<style>
    p{
        font-weight:400;
    }
    button{
        box-shadow:-5px -5px 3px black;
    }
</style>
    <section class="spacing">
        <h4>Welcome {{$name}},</h4>
        <h6>this is your profile...</h6>
        <div class="row">
            <div class="col-md-3"><p>Name</p></div>
            <div class="col-md-6"><p>{{$name}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>email</p></div>
            <div class="col-md-6"><p>{{$email}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>phone number</p></div>
            <div class="col-md-6"><p>{{$mobile}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-2"><p>gender</p></div>
            <div class="col-md-6 col-sm-3"><p>{{$gender}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>country</p></div>
            <div class="col-md-6"><p>{{$country}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>interest</p></div>
            @foreach($interest as $inter)
            <div class="col-md-1"><p>{{$inter}}</p></div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-3"><p>job</p></div>
            <div class="col-md-6"><p>{{$job}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-3"><p>user name</p></div>
            <div class="col-md-6"><p>{{$userId}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-4"><button id="profile_modal_button" class="btn btn-outline-light">update</button></div>
            <div class="col-md-4"><button class="btn btn-outline-light">back</button></div>
        </div>
    </section>
    <!--modal for update data-->
    <div class="modal" id="profile_modal">
        <div class="modal-dialogue bg-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h6>profile</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection