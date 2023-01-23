@extends('admin.layout.admin_master')
@section('content')
    <div class="card-body">
        <!-- Basic Form-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="h4 mb-0">Update Company</h3>
                </div>
                <div class="card-body pt-0">
                    <p class="text-sm">From here you can update selected companies.</p>
                    <form method="post" class="prevent" action="{{route('companies.update',$companies->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Company Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                   value="{{$companies->name}}" type="text"
                                   name="name" aria-describedby="nameHelp">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="nameHelp">Please Enter Company Name.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror"
                                   value="{{$companies->email}}" id="exampleInputEmail1"
                                   name="email" type="email" aria-describedby="emailHelp">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="emailHelp">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <div><img height="100px" src="{{$companies->logo}}" alt="..."></div>
                            <label class="form-label" for="logo">Logo</label>
                            <input class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo"
                                   type="file" value="{{$companies->logo}}">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="website">Company's Website</label>
                            <input class="form-control @error('website') is-invalid @enderror"
                                   value="{{$companies->website}}" id="website" type="url"
                                   name="website" aria-describedby="websiteHelp">
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="websiteHelp">Please Drop Company's Website.</div>
                        </div>
                        <button class="btn btn-primary prevent-button" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Button Disabled Scripts-->
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".prevent").on('submit', function () {
            $(".prevent-button").attr('disabled', true).html("Processing...");
        });
    });
</script>
