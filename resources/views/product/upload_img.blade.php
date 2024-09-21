@extends('layouts.app')

@section('title', 'View Product')

@section('content')
    <style>
        .cut-icon {
            position: absolute;
            cursor: pointer;
        }

        .cut-icon i {
            font-size: 1.3em;
            color: gray !important;
            margin-top: -20px;
            /* Adjust the size of the icon if needed */
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <!-- Display Success or Error Messages -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a href="{{ url('/product/view/' . $product->id) }}" class="btn btn-warning"><i
                                            class="mdi mdi-information"></i> Product Information</a>
                                    <a href="{{ url('/product/upload_img/' . $product->id) }}" class="btn btn-primary"><i
                                            class="mdi mdi-message-image"></i> Product Image</a>
                                </div>

                                <div class="col-6 text-right">
                                    <a href="{{ route('productList') }}" class="btn btn-success"> <i
                                            class="mdi mdi-skip-backward"></i> Back</a>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="form-body">
                                <form action="{{ route('product.save_img', $id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                            <fieldset class="form-group">
                                                <label for="name">Product Image </label>
                                                {{ html()->file('product_img[]')->class('form-control text-light')->multiple() }}
                                                @if ($errors->has('product_img'))
                                                    <span class="help-block">
                                                        <strong
                                                            class="text-danger">{{ $errors->first('product_img') }}</strong>
                                                    </span>
                                                @endif
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                            <fieldset class="form-group">
                                                <button class="btn btn-primary mt-4" type="submit"><span>Upload</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            @foreach ($product_img as $image)
                                                <td>
                                                    <img src="{{ asset('upload/product/' . $image->product_img) }}"
                                                        class="product-img">
                                                    <a href="{{ url('product/upload_img/delete/' . $image->id) }}">
                                                        <span class="cut-icon" title="Delete"><i
                                                          class="fa-solid fa-xmark mx-1"></i></span>
                                                    </a>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
