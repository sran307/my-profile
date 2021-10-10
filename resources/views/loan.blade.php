@extends("layout")
@section("title")
Loan
@endsection
@section("content")
<section class="spacing">
    <form >
        <input type="date" name="date" id="debt_date">
        <input type="text" name="amount" placeholder="Enter your debt amount" id="debt_amount">
        <button type="submit" id="loan_amount">Submit</button>
    </form>
    <h4 class="div_show my-4">Total debt : {{$data}}</h4>
    <h4 class="div_show1 my-4">Total amount paid : {{$data1}}</h4>
    <h4 class="div_show2 my-4">Amount for pay : {{$data2}}</h4>
    <form>
        <input type="date" id="debt-date" required>
        <input type="text" placeholder="Enter the amount" id="paid_amount" required>
        <button type="button" class="btn btn-secondary" id="paid_button">pay</button>
    </form>
    <a href="/dashboard" class="d-flex justify-content-center my-4"><button class="btn btn-primary">RETURN BACK</button></a>
</section>
@endsection