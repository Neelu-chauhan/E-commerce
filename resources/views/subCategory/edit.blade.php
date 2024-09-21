@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                               
                                <div class="col-6">
                                    <p class="card-title">ADD SUBCATEGORY </p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('category.list') }}" class="btn btn-success">Back</a>
                                </div>
                            </div>
                            <hr class="w-100">
                            {{ html()->form('POST', '/subcat/update/'.$sub_cat_edit->id)->open() }}
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4  mt-2 ">
                                        <fieldset class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            {{ html()->text('name')->class('form-control text-light')->value($sub_cat_edit->name)->placeholder('Enter category type') }}

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4 mt-2">
                                        <fieldset class="form-group">
                                            <label for="statu">Category Type <span class="text-danger">*</span></label>
                                          
                                            {{ html()->select('category_id_fk', $category_type)->class('form-control text-light')->value($sub_cat_edit->category_id_fk)}}
                                            @if ($errors->has('category_id_fk'))
                                                <span class="help-block">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('category_id_fk') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            {{ html()->textarea('description')->class('form-control text-light')->value($sub_cat_edit->description)->rows('5') }}

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4 mt-2">
                                        <fieldset class="form-group">
                                            <label for="statu">Status</label>
                                            {{ html()->select('status')->options(['1' => 'Active', '0' => 'Inactive'])->class('form-control text-light')->value($sub_cat_edit->status) }}
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('status') }}</strong>
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
@endsection
