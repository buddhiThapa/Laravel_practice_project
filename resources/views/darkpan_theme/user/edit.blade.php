@extends('layouts.DarkPan_layout')
@section('content')
<style>
    .form-control:disabled, .form-control:read-only{
        background-color: black;
        color: white;
    }
</style>
<form action="{{ route('Dark-Pan-theme.user.update',$UserData->id) }}" method="post">
    @method('put')
    {{ csrf_field() }}
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">User Details</h6>
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value='{{ $UserData->name }}'  class="form-control" id="name" aria-describedby="emailHelp">
                @error('name')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" name="email" value='{{ $UserData->email }}' class="form-control" id="email" aria-describedby="emailHelp">
                @error('email')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="curr_password" class="form-label">Current Password</label>
                <input type="curr_password" value='' class="form-control" id="password" >
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="new_password" value='' class="form-control" id="password" >
            </div> --}}

            <div class="mb-3">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>

@endsection