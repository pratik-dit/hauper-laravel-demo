@extends('layouts.app-master')

@section('content')
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Interest Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('interest.list') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 margin-tb">
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('interest.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Principal Amount:</strong>
                            <input type="text" name="principal_amount" class="form-control" placeholder="Principal Amount">
                        @error('principal_amount')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Interest Rate:</strong>
                            <input type="text" name="interest_rate" class="form-control" placeholder="Interest Rate">
                            @error('interest_rate')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Time Period:</strong>
                            <input type="text" name="time_period" class="form-control" placeholder="Time Period">
                            @error('time_period')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection