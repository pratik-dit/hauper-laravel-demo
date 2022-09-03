@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    @can('isAdmin')
                        <h4 class="page-title">Dashboard <span class="badge bg-soft-success text-success">You have Admin Role Access</span></h4>
                    @elsecan('isUser')
                        <h4 class="page-title">Dashboard <span class="badge bg-soft-success text-success">You have User Role Access</span></h4>
                    @else
                        <h4 class="page-title">Dashboard</h4>
                    @endcan
                </div>
            </div>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Please login.</p>
        @endguest
    </div>
@endsection