<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle"
                                                                   src="{{asset('img/avatar-6.jpg')}}" alt="...">
        <div class="ms-3 title">
            <h1 class="h5 mb-1"><a href="{{route('user.edit',auth()->user()->id)}}">{{auth()->user()->name}}</a></h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Project Manager</p>
        </div>
    </div>
    <span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
        <li class="sidebar-item {{ (request()->routeIs('admin.home')) ? 'active' : '' }}">
            <a class="sidebar-link"
               href="{{request()->routeIs('admin.home') ? 'javascript:void(0)' : route('admin.home')}}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#real-estate-1"></use>
                </svg>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item {{ (request()->routeIs('companies.index')) || (request()->routeIs('employees.index'))  ? 'active' : '' }}">
            <a class="sidebar-link active"
               href="#exampledropdownDropdown"
               data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#browser-window-1"></use>
                </svg>
                <span>Create Dropdown </span>
            </a>
            <ul class="collapse list-unstyled {{ (request()->routeIs('companies.index')) || (request()->routeIs('employees.index'))  ? 'show' : '' }}"
                id="exampledropdownDropdown">
                <li class="{{(request()->routeIs('companies.index')) ? 'active' : ''}}">
                    <a class="sidebar-link"
                       href="{{request()->routeIs('companies.index') ? 'javascript:void(0)' : route('companies.index')}}">Create Companies
                    </a>
                </li>
                <li class="{{(request()->routeIs('employees.index')) ? 'active' : ''}}">
                    <a class="sidebar-link"
                       href="{{request()->routeIs('employees.index') ? 'javascript:void(0)' : route('employees.index')}}">Create Employees
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
