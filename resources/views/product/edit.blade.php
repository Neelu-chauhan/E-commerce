@extends('layouts.app')
@section('content')
@section('title', 'Edit product')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="card-title">ADD PRODUCT TYPE </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('category.list') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <hr class="w-100">
                        {{ html()->form('POST','/product/update/' . $product_edit->id)->acceptsFiles()->open() }}
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Category <span class="text-danger">*</span></label>
                                        {{ html()->select('category_id_fk', $category_data)->class('form-control text-light')->value($product_edit->category_id_fk)}}
                                        @if ($errors->has('category_id_fk'))
                                            <span class="help-block">
                                                <strong
                                                    class="text-danger">{{ $errors->first('category_id_fk') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Sub Category <span class="text-danger">*</span></label>
                                        {{ html()->select('subcat_id_fk', $subCat_data)->class('form-control text-light')->value($product_edit->subcat_id_fk)}}

                                        @if ($errors->has('subcat_id_fk'))
                                            <span class="help-block">
                                                <strong
                                                    class="text-danger">{{ $errors->first('subcat_id_fk') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        {{ html()->text('name',$product_edit->name)->class('form-control text-light')->placeholder('Enter category type') }}

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="sku">SKU <span class="text-danger">*</span></label>
                                        {{ html()->text('sku',$product_edit->sku)->class('form-control text-light')->placeholder('Enter Stock-keeping unit') }}
                                        @if ($errors->has('sku'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('sku') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Buying Price <span class="text-danger">*</span></label>
                                        {{ html()->number('buying_price',$product_edit->buying_price)->class('form-control text-light')->placeholder('Enter buying price') }}
                                        @if ($errors->has('buying_price'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('buying_price') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name"> Selling Price <span class="text-danger">*</span></label>
                                        {{ html()->number('selling_price',$product_edit->selling_price)->class('form-control text-light')->placeholder('Enter selling price') }}
                                        @if ($errors->has('selling_price'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('selling_price') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Brand </label>
                                        {{ html()->text('brand',$product_edit->brand)->class('form-control text-light')->placeholder('Enter brand') }}
                                        @if ($errors->has('brand'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('brand') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name"> Tax </label>
                                        {{ html()->select('tax')->options(['' => 'Select', '1' => 'No -VAT', '2' => 'VAT -5', '3' => 'VAT-10', '4' => 'VAT-20'])->class('form-control text-light')->value($product_edit->tax) }}

                                        @if ($errors->has('tax'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('tax') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Status <span class="text-danger">*</span></label>
                                        {{ html()->select('status')->options(['' => 'Select status', '1' => 'Active', '0' => 'Inactive'])->class('form-control text-light')->value($product_edit->status) }}
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Can Purchasable <span class="text-danger">*</span>
                                        </label>
                                        {{ html()->select('purchasable')->options(['' => 'select', '1' => 'Yes', '0' => 'No'])->class('form-control text-light')->value($product_edit->purchasable) }}
                                        @if ($errors->has('purchasable'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('purchasable') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Show Stock Out <span class="text-danger">*</span></label>
                                        {{ html()->select('stock_out')->options(['' => 'Select', '1' => 'Enable', '0' => 'Disable'])->class('form-control text-light')->value($product_edit->stock_out) }}
                                        @if ($errors->has('stock_out'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('stock_out') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Refundable <span class="text-danger">*</span> </label>
                                        {{ html()->select('refundable')->options(['' => 'Select', '1' => 'Yes', '0' => 'No'])->class('form-control text-light')->value($product_edit->refundable) }}
                                        @if ($errors->has('refundable'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('refundable') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Maximum Purchase Quantity <span
                                                class="text-danger">*</span></label>
                                        {{ html()->number('max_quantity',$product_edit->max_quantity)->class('form-control text-light')->placeholder('Enter max quantity') }}
                                        @if ($errors->has('max_quantity'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('max_quantity') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Low Stock Quantity Warning <span
                                                class="text-danger">*</span></label>
                                        {{ html()->number('min_quantity',$product_edit->min_quantity)->class('form-control text-light')->placeholder('Enter low stock quantity') }}
                                        @if ($errors->has('min_quantity'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('min_quantity') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Unit <span class="text-danger">*</span></label>
                                        {{ html()->select('unit')->options(['' => 'Select', '1' => 'Piece (pc)', '2' => 'Gram (gm)', '3' => 'Liter (lt)'])->class('form-control text-light')->value($product_edit->unit) }}
                                        @if ($errors->has('unit'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('unit') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Weight</label>
                                        {{ html()->text('weight',$product_edit->weight)->class('form-control text-light') }}
                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('weight') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Product Image </label><br>
                                        @if($product_edit->product_image !='')
                                        <img src="{{ url('/assets/product/image/'. $product_edit->product_image)}}" alt="" width="80px;">
                                        @else
                                        <img src="{{ url('/public/assets/product/image/no-image.jpg')}}" alt="" width="80px;">
                                        @endif
                                        {{ html()->file('product_image')->class('form-control text-light') }}
                                        @if ($errors->has('product_image'))
                                            <span class="help-block">
                                                <strong
                                                    class="text-danger">{{ $errors->first('product_image') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                    <fieldset class="form-group">
                                        <label for="description">Description</label>
                                        {{ html()->textarea('description',$product_edit->description)->class('form-control text-light')->placeholder('write description')->rows('5') }}

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong
                                                    class="text-danger">{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 text-right">

                                    <button class="btn btn-primary p-2" type="submit"><span>Save</button>
                                </div>
                            </div>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        //get subcategory by category 
        $('#category_id_fk').change(function() {
            var category_id_fk = $('#category_id_fk').val();
            $.ajax({
                type: "GET",
                url: "{{ url('product/getsubcat/') }}" + "/" + category_id_fk,
                data: {
                    "category_id_fk": category_id_fk
                },
                success: function(data) {
                    $('#subcat_id_fk').empty();
                    $('#subcat_id_fk').append($('<option>', {
                        value: '',
                        text: 'Select Sub Category'
                    }));
                    $.each(data, function(key, value) {
                        $("#subcat_id_fk").append('<option value=' + key + '>' +
                            value + '</option>');

                    });
                }
            })
        });
        //get category by subcategory
        // $('#subcat_id_fk').change(function() {
        //     var subcat_id_fk = $('#subcat_id_fk').val();
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ url('product/getcat/') }}" + "/" + subcat_id_fk,
        //         data: {
        //             "subcat_id_fk": subcat_id_fk
        //         },
        //         success: function(data) {
        //             $('#category_id_fk').empty();
        //             $('#category_id_fk').append($('<option>', {
        //                  value: '',
        //                 text: 'Select Sub Category'
        //             }));
        //             $.each(data, function(key, value) {
        //                 $("#category_id_fk").append('<option value=' + key + '>' +
        //                     value + '</option>');

        //             });
        //         }
        //     })
        // });

    });
</script>
@endsection
