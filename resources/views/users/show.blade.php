@extends('layouts.global')

@section('title')
    Detail User
@endsection

@section('pageTitle')
    Detail User {{ $user->name }}
@endsection

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <b>Name: </b>
                <br>
                {{ $user->name }}
                <br><br>
                @if ($user->name)
                    <img src=" {{ asset('storage/'.$user->avatar) }} " width="128px">
                @else
                    No Avatar
                @endif

                <br><br>
                <b>Username: </b>
                <br>
                {{ $user->username }}
                <br><br>

                <br><br>
                <b>Email: </b>
                <br>
                {{ $user->email }}
                <br><br>

                <br><br>
                <b>Phone Number: </b>
                <br>
                {{ $user->phone }}
                <br><br>

                <br><br>
                <b>Address: </b>
                <br>
                {{ $user->address }}
                <br><br>

                <br><br>
                <b>Roles: </b>
                <br>
                @foreach (json_decode($user->roles) as $role)
                    &middot; {{ $role }}
                    <br>
                @endforeach

            </div>
        </div>
    </div>
@endsection