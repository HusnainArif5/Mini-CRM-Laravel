@extends('admin.layout.admin_master')
@section('content')
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <a href="{{route('companies.index')}}">
                            <div class="card-body">
                                <div class="d-flex align-items-end justify-content-between mb-2">
                                    <div class="me-2">
                                        <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                            <use xlink:href="#stack-1"></use>
                                        </svg>
                                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Companies</p>
                                    </div>
                                    <p class="text-xxl lh-1 mb-0 text-dash-color-1">{{$companies}}</p>
                                </div>
                                <div class="progress" style="height: 3px">
                                    <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%"
                                         aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-0">
                        <a href="{{route('employees.index')}}">
                            <div class="card-body">
                                <div class="d-flex align-items-end justify-content-between mb-2">
                                    <div class="me-2">
                                        <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                                            <use xlink:href="#user-1"></use>

                                        </svg>
                                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Employees</p>
                                    </div>
                                    <p class="text-xxl lh-1 mb-0 text-dash-color-2">{{$employees}}</p>
                                </div>
                                <div class="progress" style="height: 3px">
                                    <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%"
                                         aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
