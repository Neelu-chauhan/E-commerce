@extends('layouts.app')

@section('title', 'View Product')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <!-- Display Success or Error Messages -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <button class="btn btn-warning"><i class="mdi mdi-information"></i> Product Information</button>
                                    <a href="{{ url('/product/upload_img/'. $product->id)}}" class="btn btn-primary"><i class="mdi mdi-message-image"></i>  Product Image</a>
                                </div>
                               
                                <div class="col-6 text-right">
                                    <a href="{{ route('productList') }}" class="btn btn-success"> <i class="mdi mdi-skip-backward"></i>  Back</a>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row">
                                <!-- First Column -->
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Name:</div>
                                        <div class="col-8">{{ $product->name }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">SKU:</div>
                                        <div class="col-8">{{ $product->sku }}</div>
                                    </div>
                                    {{-- @dd($product->category_name->name); --}}
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Category:</div>
                                        <div class="col-8">{{ $product->category_name->name }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Sub Category:</div>
                                        <div class="col-8">{{ $product->category_name->name }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Brand:</div>
                                        <div class="col-8">{{ $product->brand }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Tax:</div>
                                        <div class="col-8">{{ $product->tax }}%</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Buying Price:</div>
                                        <div class="col-8">${{ number_format($product->buying_price, 2) }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 font-weight-bold">Selling Price:</div>
                                        <div class="col-8">${{ number_format($product->selling_price, 2) }}</div>
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Maximum Purchase Quantity:</div>
                                        <div class="col-6">{{ $product->max_quantity }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Low Stock Quantity Warning:</div>
                                        <div class="col-6">{{ $product->min_quantity }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Weight:</div>
                                        <div class="col-6">
                                            @if($product->weight!='')
                                            {{ $product->weight }} kg
                                            @else
                                            N/A
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Unit:</div>
                                        <div class="col-6">{{ $product->unit }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Purchasable:</div>
                                        <div class="col-6">{{ $product->purchasable ? 'Yes' : 'No' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Show Stock Out:</div>
                                        <div class="col-6">{{ $product->show_stock_out ? 'Yes' : 'No' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Refundable:</div>
                                        <div class="col-6">{{ $product->refundable ? 'Yes' : 'No' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6 font-weight-bold">Status:</div>
                                        <div class="col-6">{{ $product->status ? 'Active' : 'Inactive' }}</div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-12"><b>Description</b>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
