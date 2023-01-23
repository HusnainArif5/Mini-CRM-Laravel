@extends('admin.layout.admin_master')
@section('content')
    <div class="card-body">
        <!-- Basic Form-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="h4 mb-0">Create Companies</h3>
                </div>
                <div class="card-body pt-0">
                    <p class="text-sm">From here you can create new companies.</p>
                    <form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data" class="prevent">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Company Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                   name="name" aria-describedby="nameHelp">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="nameHelp">Please Enter Company Name.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                   name="email" type="email" aria-describedby="emailHelp">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="emailHelp">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="logo">Logo</label>
                            <input class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo"
                                   type="file">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="website">Company's Website</label>
                            <input class="form-control @error('website') is-invalid @enderror" id="website" type="url"
                                   name="website" aria-describedby="websiteHelp">
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="websiteHelp">Please Drop Company's Website.</div>
                        </div>
                        <button class="btn btn-primary prevent-button" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card mb-0">
            <div class="card-header">
                <h3 class="h4 mb-0">Companies Table</h3>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr style="color: #6495ED">
                            <th>Id</th>
                            <th>Company's Name</th>
                            <th>Company's Email</th>
                            <th>Company's Logo</th>
                            <th>Company's Website</th>
                            <th>Edit Company</th>
                            <th>Delete Company</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr style="color: #6495ED">
                            <th>Id</th>
                            <th>Company's Name</th>
                            <th>Company's Email</th>
                            <th>Company's Logo</th>
                            <th>Company's Website</th>
                            <th>Edit Company</th>
                            <th>Delete Company</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td><img src="{{$company->logo}}" alt="..." width="60"
                                         class="img-thumbnail rounded-circle ms-4" style="align-items: center"></td>
                                <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                                <td>
                                    <form method="get" class="prevent" action="{{route('companies.edit',$company->id)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary prevent-button w-100">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" class="prevent" action="{{route('companies.destroy',$company->id)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger prevent-button w-100">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$companies->links() }}
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
