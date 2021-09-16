@extends("layout")
@section("title")
Dashboard
@endsection
@section("content")

    <section class="dashboard">
        <div class="container">
            @if(session()->has("success_message"))
            <div class="alert alert-success">
                {{session()->get("success_message") }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/chitty"><button class="solid-button">Upload Chitty Amount</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/chitty_total_amount"><button class="solid-button">Chitty Total Amount</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/number_of_months_paid"><button class="solid-button">Chitty Number Of Months Paid</button></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/loan"><button class="solid-button">Upload Loan Amount</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/loan_amount"><button class="solid-button">Total loan amount paid</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/credit"><button class="solid-button">Upload Your Earnings</button></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href ="/expense"><button class="solid-button">Upload Your Expenses</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href ="/earned"><button class="solid-button">Total Amount Earned</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href ="/spent"><button class="solid-button">Total Money Spent</button></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href ="/savings"><button class="solid-button">Total savings</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href="/nakshathra"><button class="solid-button">Go to nakshathra</button></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <a href ="/stocks"><button class="solid-button">ASSETS</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection