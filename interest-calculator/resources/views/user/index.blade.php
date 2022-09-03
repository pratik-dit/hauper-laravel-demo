@extends('layouts.app-master')

@section('content')
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User List</h2>
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
            <th>Name</th>
            <th>Email</th>
            <th>Total Interest Amount</th>
        </tr>
        @foreach ($users as $key => $user)
        <tr>
            <th>{{ $key + 1 }}</th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>₹ {{ $user->user_interest_sum_total_interest }}</td>
        </tr>
        @endforeach
    </table>

    {!! $users->links() !!}
</div>
@endsection