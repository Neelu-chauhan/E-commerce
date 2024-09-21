@extends('layouts.app')
@section('content')
@section('title', 'Update Permission')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="card-title">ADD PERMISSION </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('permission.list') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <hr class="w-100">
                        {{-- @dd($permission->id); --}}
                        {{ html()->form('POST', '/permission/update/' . $permission->id)->open() }}
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        {{ html()->text('name', $permission->name)->class('form-control text-light')->placeholder('Enter Role') }}

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Categories <span class="text-danger">*</span></label>
                                        <select name="category" id="category" class="form-control text-white">
                                            <option value="{{@$permission->id}}">
                                                @if($permission->category)
                                                {{$permission->getcategory->name}}
                                                @else
                                                Select Category
                                                @endif
                                            </option>
                                            @foreach ($category as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4 mt-2">
                                    <fieldset class="form-group">
                                        <label for="statu">Status <span class="text-danger">*</span></label>
                                        {{ html()->select('status')->options(['1' => 'Active', '0' => 'Inactive'])->class('form-control text-light')->value($permission->status) }}
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
                                        {{ html()->textarea('description')->class('form-control text-light')->value($permission->description)->placeholder('write description')->rows('5') }}

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
