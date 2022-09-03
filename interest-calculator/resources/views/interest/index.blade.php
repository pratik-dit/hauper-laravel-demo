@extends('layouts.app-master')

@section('content')
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Calculate Principal Interest</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('interest.create') }}"> Create </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Principal Amount</th>
            <th>Interest Rate</th>
            <th>Time Period</th>
            <th>Interest Amount</th>
        </tr>
        @foreach ($usersInterest as $key => $userInterest)
        <tr>
            <th>{{ $key + 1 }}</th>
            <td>₹ {{ $userInterest->principal_amount }}</td>
            <td>₹ {{ $userInterest->interest_rate }}</td>
            <td>₹ {{ $userInterest->time_period }}</td>
            <td>₹ {{ $userInterest->total_interest }}</td>
        </tr>
        @endforeach
    </table>

    {!! $usersInterest->links() !!}
</div>
@endsection