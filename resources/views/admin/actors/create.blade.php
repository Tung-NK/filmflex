@extends('admin.layout.default')

@section('title')
    Add New Actor
@endsection

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Add New Actor</h2>
                </div>

                <a href="{{ route('actors.index') }}" class="btn btn-warning" style="color: white;">Back to List</a>

                <div class="catalog catalog--1" style="margin-top: 20px;">
                    <form action="{{ route('actors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="actor_name" class="form-label" style="color: white;">Actor Name:</label>
                            <input type="text" id="actor_name" name="actor_name" class="form-control" value="{{ old('actor_name') }}" >
                            @if ($errors->has('actor_name'))
                            <span class="text-danger">{{ $errors->first('actor_name') }}</span>
                            @endif
                            
                        </div>

                        <div class="mb-3">
                            <label for="biography" class="form-label" style="color: white;">Biography:</label>
                            <textarea id="biography" name="biography" class="form-control" >{{ old('biography') }}</textarea>
                            @if ($errors->has('biography'))
                            <span class="text-danger">{{ $errors->first('biography') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                        <label for="image" class="form-label text-white">Image:</label>
                        <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                        <small class="form-text text-white">Please select the image again if there are other errors.</small> <!-- Thông báo người dùng chọn lại -->
                        
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning" style="color: black;">Add New Actor</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
