@extends('admin.layouts.master')
@section('title','Education Edit')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Education</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Education</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.education.update', $education->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Institute Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="institute_name" class="form-control" value="{{ $education->institute_name }}">
                            @error('institute_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Degree Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="degree" class="form-control" value="{{ $education->degree }}">
                            @error('degree')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Year</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="start_year" class="form-control" value="{{ $education->start_year }}">
                            @error('start_year')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Year</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="end_year" class="form-control" value="{{ $education->end_year }}">
                            @error('end_year')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="description" class="form-control summernote">{{ $education->description }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
