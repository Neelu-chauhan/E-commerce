@extends('layouts.app')
@section('content')
@section('title', 'Assign Permission')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                           
                            <div class="col-6">
                                <p class="card-title">ASSIGN PERMISSION </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('users.list') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <hr class="w-100">
                        <form method="POST" action="{{ url('/users/permission/' . $id) }}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    @if ($permissions->isNotEmpty())
                                        @php
                                            $permissionIds = $get_per ? explode(',', $get_per->permission_id_fk) : [];
                                            // dd($permissionIds);
                                        @endphp
                                        @foreach ($permissions as $key => $value)
                                            {{-- @dd($permissions->toArray()); --}}
                                            @php
                                                $isChecked = in_array($value->per_id, $permissionIds) ? 'checked' : '';
                                                // dd($isChecked);
                                            @endphp
                                            <div class="col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                                        value="{{ $value->per_id }}"
                                                        id="permission-{{ $value->per_id }} " {{ $isChecked }}>
                                                    <label class="form-check-label text-light"
                                                        for="{{ $value->per_id }}">{{ $value->name }}-({{ $value->per_id }})</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
