@extends('layouts.app')
@section('content')
@section('title', 'ROLE LIST')

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
                                <h4 class="card-title">ROLES LIST</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary"> Add New</a>
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
                                            <th>Created at</th>
                                            <th>Permission</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($roles as $key => $data)
                                            {{-- @dd($roles); --}}
                                            <tr id="{{ $data->id }}">
                                                <td>{{ $x }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->created_at->diffForHumans() }}</td>
                                                <td>{{ $data->description }}</td>

                                                <td>
                                                    @if ($data->status == 1)
                                                        <?php
                                                        $statusClass = 'btn btn-sm btn-success';
                                                        $statusURl = url('/roles/status/');
                                                        $statusname = 'Active';
                                                        ?>
                                                    @else
                                                        <?php
                                                        $statusClass = 'btn btn-sm btn-danger';
                                                        $statusURl = url('/roles/status/');
                                                        $statusname = 'In-active';
                                                        ?>
                                                    @endif
                                                    <a
                                                        href="{{ $statusURl . '/' . $data->id }}"title="{{ $statusname }}">
                                                        <input type="button"
                                                            class="{{ $statusClass }}"value="{{ $statusname }}">
                                                </td>
                                                <td>
                                                    @php
                                                        $getid =($data->id);
                                                        $getEncId = base64_encode($getid+50002);
                                                        // dd($getEncId);
                                                    @endphp
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle"
                                                            type="button" id="dropdownMenuButton1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>                                                        
                                                        <ul class="dropdown-menu dropdown-menu-custom"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                    href="{{ url('/roles/edit/' . $data->id) }}">Edit</a>
                                                            </li>
                                                            <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                    data-confirm='Are you sure you want to delete this ?'
                                                                    href="{{ url('/roles/delete/' . $data->id) }}">Delete</a>
                                                            </li>
                                                            <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                    href="{{ url('/roles/assign/' .$getEncId) }}">Assign
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
