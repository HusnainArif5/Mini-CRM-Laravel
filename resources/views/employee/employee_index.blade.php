@extends('admin.layout.admin_master')
@section('content')
    <div class="card-body">
        <!-- Basic Form-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="h4 mb-0">Create Employees</h3>
                </div>
                <div class="card-body pt-0">
                    <p class="text-sm">From here you can create new employees.</p>
                    <form method="post" action="{{route('employees.store')}}" enctype="multipart/form-data"
                          class="prevent">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="fname">First Name</label>
                            <input class="form-control @error('fname') is-invalid @enderror" id="fname" type="text"
                                   name="fname" aria-describedby="fnameHelp">
                            @error('fname')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="fnameHelp">Please Enter First Name.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lname">Last Name</label>
                            <input class="form-control @error('lname') is-invalid @enderror" id="lname" type="text"
                                   name="lname" aria-describedby="lnameHelp">
                            @error('lname')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="lnameHelp">Please Enter Last Name.</div>
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
                            <label class="form-label" for="company_id">Company</label>
                            <select class="form-select mb-3 @error('company_id') is-invalid @enderror"
                                    name="company_id">
                                <option value="" disabled selected hidden>Select a Company</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}" name="company_id">{{$company->name}}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="number"
                                   name="phone" aria-describedby="phoneHelp">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="form-text" id="phoneHelp">Please Drop Employee's Phone Number.</div>
                        </div>
                        <button class="btn btn-primary prevent-button" id="submit" type="submit">Create</button>
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
                            <th>Employee's Name</th>
                            <th>Employee's Email</th>
                            <th>Employee's Company</th>
                            <th>Employee's Phone#</th>
                            <th>Edit Employee</th>
                            <th>Delete Employee</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr style="color: #6495ED">
                            <th>Id</th>
                            <th>Employee's Name</th>
                            <th>Employee's Email</th>
                            <th>Employee's Company</th>
                            <th>Employee's Phone#</th>
                            <th>Edit Employee</th>
                            <th>Delete Employee</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->fname.' '.$employee->lname}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <form method="get" class="prevent"
                                          action="{{route('employees.edit',$employee->id)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary prevent-button w-100">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" class="prevent"
                                          action="{{route('employees.destroy',$employee->id)}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger prevent-buttton w-100">Delete
                                        </button>
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
    {{$employees->links() }}
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
