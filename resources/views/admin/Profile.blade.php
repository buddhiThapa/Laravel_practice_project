@extends('layouts.DarkPan_layout')

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Input Group</h6>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control text-white" placeholder="Name" aria-label="Username" name="name"
                        aria-describedby="basic-addon1" value="{{ (isset($user['name']) && $user['name']!='' ) ? $user['name'] : old('name')}}" >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Email</span>
                    <input type="email" name="email" class="form-control text-white" placeholder="Enter Email"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ (isset($user['email']) && $user['email']!='' ) ? $user['email'] : old('email')}}" >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Skill Description</span>
                    <textarea class="form-control text-white" placeholder="Write About Work" aria-label="With textarea" name='work_description'>{{ (isset($user['work_description']) && $user['work_description']!='' ) ? $user['work_description'] : old('work_description')}}</textarea>
                </div>
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <div class="h-100 bg-secondary rounded p-4">
                        <div class="d-flex mb-2">
                            <input class="form-control bg-transparent text-white skill-input" type="text" placeholder="Enter Skill Heading">
                            <button type="button" class="btn btn-primary ms-2 add-more" disabled>Add</button>
                        </div>
                        <div class="skills-div">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Profile</h6>
                <div class="input-group mb-3">
                    <img src="" alt="">
                    <input type="file" class="form-control bg-dark"  placeholder="Enter Year" aria-label="experience">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Experience</span>
                    <input type="text" class="form-control" placeholder="Enter Year" name="experience" value="{{ (isset($user['experience']) && $user['experience']!='' ) ? $user['experience'] : old('experience')}}" aria-label="experience">
                    <span class="input-group-text">Year</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Project count</span>
                    <input type="text" class="form-control" name="project_count" placeholder="Enter Project Count" aria-label="project count" {{ (isset($user['project_count']) && $user['project_count']!='' ) ? $user['project_count'] : old('project_count')}}>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

@endsection
