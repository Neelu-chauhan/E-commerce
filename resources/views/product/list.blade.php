@extends('layouts.app')
@section('content')
@section('title', 'productList')

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
                                <h4 class="card-title">PRODUCT LIST</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('product.create') }}" class="btn btn-primary">  Add Product</a>
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
                                            <th>Category</th>
                                            <th>Buying Price</th>
                                            <th>Selling price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($products as $key => $data)
                                            <tr id="{{ $data->id }}">
                                                <td>{{ $x }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->category_name->name }}</td>
                                                <td>$ {{ number_format($data->buying_price, 2) }}</td>
                                                <td>$ {{ number_format($data->selling_price, 2) }}</td>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <?php
                                                        $statusClass = 'btn btn-sm btn-success';
                                                        $statusURl = url('/product/status/');
                                                        $statusname = 'Active';
                                                        ?>
                                                    @else
                                                        <?php
                                                        $statusClass = 'btn btn-sm btn-danger';
                                                        $statusURl = url('/product/status/');
                                                        $statusname = 'In-active';
                                                        ?>
                                                    @endif
                                                    <a href="{{ $statusURl . '/' . $data->id }}"title="{{ $statusname }}"> <input type="button" class="{{ $statusClass }}"value="{{ $statusname }}">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                            <a href="{{url('/product/view/'.$data->id)}}" class="btn btn-sm btn-inverse-warning" title="View"><i class="mdi mdi-eye"></i></a>
                                                            <a href="{{url('/product/edit/'.$data->id)}}" class="btn btn-sm btn-inverse-success" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
                                                            <a href="{{url('/product/delete/'.$data->id)}}" data-confirm='Are you sure you want to delete this ?' class="btn btn-sm btn-inverse-danger" title="Delete"><i class="mdi mdi-delete" ></i></a>
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
