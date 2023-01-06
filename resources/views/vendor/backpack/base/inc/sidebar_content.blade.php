{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-paw nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon las la-cat"></i> Products
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon las la-otter"></i> Products</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product-type') }}"><i class="nav-icon la la-th-list"></i> Product Types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product-size') }}"><i class="nav-icon la la-th-list"></i> Product Sizes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product-comment') }}"><i class="nav-icon la la-th-list"></i> Product Comments</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product-tag') }}"><i class="nav-icon la la-th-list"></i> Product Tags</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product-history') }}"><i class="nav-icon la la-th-list"></i> Product Histories</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-group"></i> Authentication
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-group"></i> Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> Permissions</a>
        </li>
    </ul>
</li>