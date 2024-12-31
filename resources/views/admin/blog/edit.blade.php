@extends('admin.layouts.master')
@section('title','Edit Blog')

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
              <h4>Edit Blog</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}"
                                       required>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}"
                                       required>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categories</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="categories[]" multiple required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($blog->categories->contains('id', $category->id))
                                                selected
                                            @endif>
                                            {{ $category->name }}
                                        </option>
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
                                                  class="form-control" rows="3">{{ $blog->description }}</textarea>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="content" class="summernote">{{ $blog->content }}</textarea>
                            </div>
                        </div>

                        <!-- Meta Keywords -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta
                                Keywords</label>
                            <div class="col-sm-12 col-md-7">
                                        <textarea name="meta_keywords"
                                                  class="form-control">{{ $blog->meta_keywords }}</textarea>
                            </div>
                        </div>

                        <!-- Published -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="published">
                                    <option value="1" {{ $blog->published == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $blog->published == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Allow Comments -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Allow
                                Comments</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="allow_comments">
                                    <option value="1" {{ $blog->allow_comments == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $blog->allow_comments == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
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
    $(document).ready(function(){
        $('#image-preview').css({
            'background-image': 'url("{{asset($blog->meta_image)}}")',
            'background-size': 'cover',
            'background-position': 'center center'
        })
    });
  </script>
@endpush
