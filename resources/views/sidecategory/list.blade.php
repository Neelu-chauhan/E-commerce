@extends('layouts.app')
@section('content')
@section('title', 'sidecategory List')

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

    .swal-wide {
        width: 200 !important;
        height: 150 !important;
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
                                <h4 class="card-title">sidecategory LIST</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('sidecategory.create') }}" class="btn btn-primary"> Add
                                    New</a>
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
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @foreach ($sidecategory as $key => $data)
                                        <tr id="{{ $data->id }}">
                                            <td>{{ $x }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                @if ($data->status == 1)
                                                    <?php
                                                    $statusClass = 'btn btn-sm btn-success';
                                                    $statusURl = url('/sidecategory/status/');
                                                    $statusname = 'Active';
                                                    ?>
                                                @else
                                                    <?php
                                                    $statusClass = 'btn btn-sm btn-danger';
                                                    $statusURl = url('/sidecategory/status/');
                                                    $statusname = 'In-active';
                                                    ?>
                                                @endif
                                                <a href="{{ $statusURl . '/' . $data->id }}"title="{{ $statusname }}">
                                                    <input type="button"
                                                        class="{{ $statusClass }}"value="{{ $statusname }}">
                                            </td>
                                            <td>
                                                <div class="dropdown">

                                                    <a href="{{ url('/sidecategory/edit/' . $data->id) }}"
                                                        class="btn btn-sm btn-inverse-success" title="Edit"><i
                                                            class="mdi mdi-tooltip-edit"></i></a>
                                                    <a href="{{ url('/sidecategory/delete/' . $data->id) }}"
                                                        data-confirm='Are you sure you want to delete this ?'
                                                        class="btn btn-sm btn-inverse-danger dlt-btn" title="Delete"><i
                                                            class="mdi mdi-delete"></i></a>
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
