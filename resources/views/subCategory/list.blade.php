@extends('layouts.app')
@section('content')
@section('title', 'sub-category')

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
                                <h4 class="card-title">SUB CATEGORY LIST</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('subcat.create') }}" class="btn btn-primary">Add sub Category</a>
                            </div>
                        </div>
                        <hr class="w-100" />
                            <br />
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-light">
                                        <thead>
                                            <tr class="text-light">
                                                <th>Id</th>
                                                <th>Sub Category Name</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $x = 1; @endphp @foreach ($subcategories as $key => $data)
                                                <tr id="{{ $data->id }}">
                                                    <td>{{ $x }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->category_name }}</td>

                                                    <td>
                                                        @if ($data->status == 1)
                                                            <?php
                                                            $statusClass = 'btn btn-sm btn-success';
                                                            $statusURl = url('/subcat/status/');
                                                            $statusname = 'Active';
                                                            ?>
                                                        @else
                                                            <?php
                                                            $statusClass = 'btn btn-sm btn-danger';
                                                            $statusURl = url('/subcat/status/');
                                                            $statusname = 'In-active';
                                                            ?>
                                                        @endif
                                                        <a href="{{ $statusURl . '/' . $data->id }}"
                                                            title="{{ $statusname }}">
                                                            <input type="button" class="{{ $statusClass }}"
                                                                value="{{ $statusname }}">
                                                    </td>

                                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-custom"
                                                                aria-labelledby="dropdownMenuButton1">
                                                                <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                        href="{{ url('/subcat/edit/' . $data->id) }}">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item dropdown-item-custom text-light"
                                                                     data-confirm='Are you sure you want to delete this ?'
                                                                        href="{{ url('/subcat/delete/' . $data->id) }}">Delete</a>
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
</div>

<script src="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.min.js"></script>
@endsection
