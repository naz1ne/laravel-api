@extends('layouts.admin')

@section('content')

<h1>Create a new Project!</h1>
@include('partials.errors')
<form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Add title.." aria-describedby="titleHelper" value="{{old('title')}}">
            <small id="titleHelper" class="text-muted">Add a new Title</small>
      </div>
      <!-- ################# -->
      <div class="form-group">
            <label for="gitHubUrl">Git Hub Url</label>
            <input type="text" name="gitHubUrl" id="gitHubUrl" class="form-control @error('gitHubUrl') is-invalid @enderror" placeholder="Add gitHubUrl.." aria-describedby="gitHubUrlHelper" value="{{old('gitHubUrl')}}">>
            <small id="gitHubUrlHelper" class="text-muted">Add a new Git Hub Url</small>
      </div>
      <!-- ################# -->
      <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="coverImageHelper" value="{{old('cover_image')}}">
            <small id="coverImageHelper" class="text-muted">Add your cover image</small>
      </div>
      <!-- ################# -->
      <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                  <option selected>Select one</option>

                  @foreach ($types as $type )
                  <!-- TODO fix old value -->
                  <option value="{{$type->id}}" {{ $type->id == old('type_id',  $project->type ? $project->type->id : '') ? 'selected' : '' }}>{{$type->name}}</option>
                  @endforeach

            </select>
      </div>
      <!-- ################# -->
      <div class="mb-3">
            <label for="technologies" class="form-label">Technology</label>
            <select multiple class="form-select form-select-lg" name="technologies[]" id="technologies">
                  <option value="" disabled>Select one</option>
                  @forelse ($technologies as $technology)
                  <option value="{{$technology->id}}" {{in_array($technology->id, old('technologies', [])) ? 'selected' : ''}}>{{$technology->name}}</option>
                  @empty
                  <h6>Sorry.No technologies inside the database yet.</h6>
                  @endforelse
            </select>
      </div>
      <!-- ################# -->
      <div class="mb-3">
            <label for="description" class="form-label ">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{old('description')}}</textarea>
      </div>
      <!-- ################# -->
      <div class="form-group">
            <label for="date">Creation Date</label>
            <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="Add date.." aria-describedby="dateHelper" value="{{old('date')}}">
            <small id="dateHelper" class="text-muted">Add a date</small>
      </div>
      <!-- ################# -->
      <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
@endsection