@extends('admin.layouts.master')
@section('title','Create Blog')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Blog</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Image Upload -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="meta_image" id="image-upload"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="categories[]" multiple required>
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description"
                                                  class="form-control" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="content" class="summernote">{{ old('content') }}</textarea>
                                    </div>
                                </div>

                                <!-- Meta Keywords -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta
                                        Keywords</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="meta_keywords"
                                                  class="form-control">{{ old('meta_keywords') }}</textarea>
                                    </div>
                                </div>

                                <!-- Published -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="published">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Allow Comments -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Allow
                                        Comments</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="allow_comments">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Create</button>
                                    </div>
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
        $(document).ready(function () {
            $('#image-preview').css({
                'background-image': 'url("")',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });

        $(document).on('change keyup', 'input[name="title"]', function () {
            var title = $(this).val();
            var slug = title
                .toLowerCase()
                .replace(/[^a-z0-9\s]/g, '')  // Remove special characters
                .replace(/\s+/g, '-')        // Replace spaces with hyphens
                .trim();                     // Trim leading/trailing spaces
            $('input[name="slug"]').val(slug);
        });
    </script>
@endpush
