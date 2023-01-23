@extends('admin.layout.admin_master')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="h4 mb-0">Edit Admin Info</h3>
            </div>
            <div class="card-body pt-0">
                <p class="text-sm">From here you can change your password and email.</p>
                <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                        <input class="form-control @error('old_password') is-invalid @enderror" id="exampleInputEmail1"
                               type="email" value="{{$user->email}}" name="email" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                        @enderror
                        <div class="form-text" id="emailHelp">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="oldPassword">Current Password</label>
                        <input class="form-control @error('old_password') is-invalid @enderror" id="old_password"
                               name="old_password" type="password" placeholder="Please Enter Current Password">
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="newPassword">New Password</label>
                        <input class="form-control @error('old_password') is-invalid @enderror" id="password"
                               name="password" type="password" placeholder="Enter New Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <input class="form-control @error('old_password') is-invalid @enderror"
                               name="password_confirmation" id="password_confirmation" type="password"
                               placeholder="Confirm your Password">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
