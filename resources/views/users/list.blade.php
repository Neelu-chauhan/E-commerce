@extends('layouts.app')
@section('content')
@section('title', 'User List')

<link href="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.css" rel="stylesheet">
<style>
    .dropdown-menu-custom {
        min-width: 50px;
        /* Adjust width as needed */
    }

    .dropdown-item-custom {
        white-space: nowrap;
        /* Prevent text wrapping */
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title">USERS LIST</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary"> Add New</a>
                            </div>
                        </div>
                        <hr class="w-100" />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered text-light">
                                <thead>
                                    <tr class="text-light">
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Role</th>
                                        {{-- <th>Permission</th> --}}
                                        <th>Phone</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @foreach ($users as $key => $data)
                                        <tr id="{{ $data->id }}">
                                            <td>{{ $x }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ @$data->getCountry->nicename }}</td>
                                            <td>
                                                <form action="{{ url('users/roles/' . $data->id) }}" method="POST">
                                                    @csrf
                                                    <select name="role_id_fk" id="role_id_fk"
                                                        class="form-control text-white" onchange="this.form.submit()">
                                                        @if ($data->role_id_fk)
                                                            <option value="{{ $data->id }}" selected>
                                                                {{ $data->getrole->name }}</option>
                                                        @else
                                                            <option value="">select role</option>
                                                        @endif
                                                        @foreach ($roles as $key => $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->created_at->diffForHumans() }}</td>

                                            <td>
                                                @if ($data->status == 1)
                                                    <?php
                                                    $statusClass = 'btn btn-sm btn-success';
                                                    $statusURl = url('/users/status/');
                                                    $statusname = 'Active';
                                                    ?>
                                                @else
                                                    <?php
                                                    $statusClass = 'btn btn-sm btn-danger';
                                                    $statusURl = url('/users/status/');
                                                    $statusname = 'In-active';
                                                    ?>
                                                @endif
                                                <a
                                                    href="{{ $statusURl . '/' . $data->id }}"title="{{ $statusname }}">
                                                    <input type="button"
                                                        class="{{ $statusClass }}"value="{{ $statusname }}">
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle"
                                                        type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    @php
                                                        $get_id= ($data->id);                                                    
                                                        $get_id_new = ($get_id+50002);
                                                        $getEncId = base64_encode($get_id_new);
                                                    @endphp
                                                    <ul class="dropdown-menu dropdown-menu-custom"
                                                        aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                href="{{ url('/users/edit/' . $getEncId) }}">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                data-confirm='Are you sure you want to delete this ?'
                                                                href="{{ url('/users/delete/' . $data->id) }}">Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item dropdown-item-custom text-light" href="{{ url('/roles/assign/' . $getEncId) }}">Assign
                                                                Permission</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $x++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.js"></script>
@endsection
