@extends('layouts.app') @section('content') @section('title', 'Assign Permission')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="card-title">ASSIGN PERMISSION  FOR ( {{$role->name}} )</p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('role.list') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <hr class="w-100" />
                        {{-- @dd($get_per->permission_id_fk); --}}
                        <form method="POST" action="{{ url('/roles/assign/store/' . $id) }}">
                            @csrf
                            <div class="container">
                                @if ($sidecategory->isNotEmpty())
                                    @php $permissionIds = $get_per ? explode(',', $get_per->permission_id_fk) : []; @endphp
                                    @foreach ($sidecategory as $key => $category)
                                        @php $isChecked = in_array($category->id, $permissionIds) ? 'checked' : ''; @endphp
                                            {{-- @dd($role->name); --}}
                                        <div class="row" style="border:1px solid white">
                                            <h4 class="bg-secondary text-black p-2 w-100" for="{{ $category->id }}">
                                                {{ $category->name }} Permission:
                                            </h4>
                                            <div class="form-check m-0">
                                                <!-- Category checkbox, notice it does not use the 'permission[]' name -->
                                                <input type="checkbox" class="form-check-input mx-0 mt-3"
                                                    id="check_all-{{ $category->id }}" {{ $isChecked }}
                                                    style="cursor: pointer;" />

                                                <label class="form-check-label" for="check_all-{{ $category->id }}">
                                                    <h3 class="mx-3 mt-2 text-white-50">
                                                        {{ $category->name }} - {{ $category->id }}
                                                    </h3>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row" style="border:1px solid white">
                                            @foreach ($category->getPermissionData as $permission)
                                                @php $isChecked = in_array($permission->id, $permissionIds) ? 'checked' : ''; @endphp
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-check m-0 mt-2">
                                                        <!-- Permission checkboxes retain the 'permission[]' name -->
                                                        <input type="checkbox" class="form-check-input"
                                                            name="permission[]" value="{{ $permission->id }}"
                                                            id="check_box-{{ $permission->id }}"
                                                            data-category="{{ $category->id }}" {{ $isChecked }} />
                                                        <label class="form-check-label text-light"
                                                            for="check_box-{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-5 float-right">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            // Event handler for "select all" category checkboxes
            $('input[id^="check_all-"]').on("change", function() {
                var category_id = $(this).attr('id').split('-')[1];
                var isChecked = $(this).prop('checked');

                // Select or deselect all sub-permission checkboxes under the category
                $(`input[data-category="${category_id}"]`).each(function() {
                    $(this).prop('checked', isChecked);
                });
            });

            // Optionally: If all sub-permissions are unchecked, uncheck the category checkbox
            $('input[id^="check_box-"]').on("change", function() {
                var category_id = $(this).data('category');
                var allChecked = $(`input[data-category="${category_id}"]`).length ===
                    $(`input[data-category="${category_id}"]:checked`).length;
                $(`#check_all-${category_id}`).prop('checked', allChecked);
            });
        });
    });
</script>
@endsection
