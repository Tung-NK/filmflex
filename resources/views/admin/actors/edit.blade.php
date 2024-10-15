@extends('admin.layout.home')

@section('title')
    Edit Actor
@endsection


<main class="main">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-12">
                <div class="main__title">
                    <h2>Edit Actor</h2> 
                </div>
                <a href="{{ route('actors.index') }}" class="btn btn-warning">Actor List</a>
            </div>
           
            <div class="col-12">
                <div class="catalog catalog--1">
                    <form action="{{ route('actors.update', $actor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-8">
                                    <div class="mb-3">
                                        <label for="actor_name" class="form-label text-white">Actor Name:</label> 
                                        <input type="text" id="actor_name" name="actor_name" class="form-control {{ $errors->has('actor_name') ? 'is-invalid' : '' }}" value="{{ old('actor_name', $actor->actor_name) }}" >
                                        @if ($errors->has('actor_name'))
                                            <span class="text-danger">{{ $errors->first('actor_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label text-white">Image:</label> 
                                        <input type="file" id="image"  name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                        <small class="form-text text-white">Select a new image if you want to change it.</small> 
                                        @if ($actor->image)
                                            <img src="{{ Storage::url($actor->image) }}" width="100px" height="80px" alt="{{ $actor->actor_name }}">
                                        @endif
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="biography" class="form-label text-white">Biography:</label> 
                                        <textarea id="biography" name="biography" class="form-control {{ $errors->has('biography') ? 'is-invalid' : '' }}">{{ old('biography', $actor->biography) }}</textarea>
                                        @if ($errors->has('biography'))
                                            <span class="text-danger">{{ $errors->first('biography') }}</span>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-warning" style="color: white;">Update Actor</button> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</main>

