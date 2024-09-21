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
                                    <p class="card-title">ADD SIDE CATEGORY </p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('sidecategory.list') }}" class="btn btn-success">Back</a>
                                </div>
                            </div>
                            <hr class="w-100">
                            {{ html()->form('POST', '/sidecategory/store/')->open() }}
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4  mt-2 ">
                                        <fieldset class="form-group">
                                            <label for="name">Category name <span class="text-danger">*</span></label>
                                            {{ html()->text('name')->class('form-control text-light')->placeholder('Enter Side category Name') }}

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4 mt-2">
                                        <fieldset class="form-group">
                                            <label for="statu">Status</label>
                                            {{ html()->select('status')->options(['1' => 'Active', '0' => 'Inactive'])->class('form-control text-light') }}
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            {{ html()->textarea('description')->class('form-control text-light')->placeholder('write description')->rows('5') }}

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
@endsection
