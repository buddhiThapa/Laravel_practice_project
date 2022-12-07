@extends('layouts.DarkPan_layout')
@section('content')
<style>
    .form-control:disabled, .form-control:read-only{
        background-color: black;
        color: white;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">User Details</h6>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" value={{ $UserData->name }}  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" value={{ $UserData->email }} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" value={{ date('d-m-Y',strtotime($UserData->created_at)) }} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input').prop('disabled',true);
    });
</script>

@endsection