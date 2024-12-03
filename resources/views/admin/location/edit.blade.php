@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Location</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.location.index') }}">Location</a></div>
                <div class="breadcrumb-item">{{ $location->id }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Location</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.location.update', $location->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $location->name }}">
                                </div>


                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="show_at_home" class="custom-switch-input"
                                            value="1" @if ($location->show_at_home == 1) checked @endif>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Show at Home</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="status" class="custom-switch-input" value="1"
                                            @if ($location->status == 1) checked @endif>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Status</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Location</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
