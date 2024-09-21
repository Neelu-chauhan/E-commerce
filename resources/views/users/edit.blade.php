@extends('layouts.app')
@section('content')
@section('title', 'Edit User')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="card-title">EDIT PRODUCT TYPE </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('category.list') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <hr class="w-100">
                        {{ html()->form('POST', '/users/update/' . $users->id)->acceptsFiles()->open() }}
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-4  mt-2 ">
                                    <fieldset class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        {{ html()->text('name', @$users->name)->class('form-control text-light')->placeholder('Enter user name') }}
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
                                        {{ html()->email('email', @$users->email)->class('form-control text-light')->placeholder('Email ex-@example.com') }}

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 ">
                                    <fieldset class="form-group">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        {{ html()->number('phone', @$users->phone)->class('form-control text-light')->placeholder('Enter phone no.') }}

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 ">
                                    <fieldset class="form-group">
                                        {{-- @dd($users->country_id); --}}
                                        <label for="country">country <span class="text-danger">*</span></label>
                                        @if ($users->country_id != null)
                                            {{ html()->text('country_id')->class('form-control text-dark')->value(@$users->getCountry->nicename)->attribute('readonly', 'readonly') }}
                                        @else
                                            <select class="form-control text-light" id="country_id" name="country_id">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->nicename }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6  ">
                                    <fieldset class="form-group">
                                        <label for="dob">Date of birth <span class="text-danger">*</span></label>
                                        {{ html()->date('dob', @$users->dob)->class('form-control text-light')->placeholder('Enter category type') }}
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
                                        {{ html()->select('status')->options(['1' => 'Active', '0' => 'Inactive'])->value($users->status)->class('form-control text-light') }}
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 ">
                                    <fieldset class="form-group">
                                        <label for="image">User photo <span class="text-danger">*</span></label><br>
                                        @if ($users->image)
                                            <img src="{{ asset('assets/users/' . @$users->image) }}" alt="image"
                                                width="80px">
                                        @endif
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
