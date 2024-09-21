@extends('layouts.app')
@section('content')
@section('title', 'Create Users')
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
                        {{ html()->form('POST', '/users/store')->acceptsFiles()->open() }}
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        {{ html()->text('name')->class('form-control text-light')->placeholder('Enter user name') }}

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        {{ html()->email('email')->class('form-control text-light')->placeholder('Email ex-@example.com') }}

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        {{ html()->Password('password')->class('form-control text-light')->placeholder('Enter password') }}

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="phone">Phone no. <span class="text-danger">*</span></label>
                                        {{ html()->number('phone')->class('form-control text-light')->placeholder('Enter phone') }}

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="country">country <span class="text-danger">*</span></label>
                                        <select class="form-control text-light" id="country" name="country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->nicename }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="dob">Date of birth <span class="text-danger">*</span></label>
                                        {{ html()->date('dob')->class('form-control text-light')->placeholder('Enter category type') }}
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <fieldset class="form-group">
                                        <label for="dob">Status</label>
                                        {{ html()->select('status')->options(['1' => 'Active', '0' => 'Inactive'])->class('form-control text-light') }}
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="image">User photo <span class="text-danger">*</span></label>
                                        {{ html()->file('image')->class('form-control text-light') }}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
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
