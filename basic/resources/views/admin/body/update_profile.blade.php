@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    <div class="card-body">
        <form action ="{{route('password.update')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="text" class="form-control" name="email" value="{{ $user['name'] }}">
            </div>

            <button type="submit" class="btn btn-primary btn-default">Update</button>

        </form>
    </div>
</div>
@endsection