@extends('admin.layout.home')

@section('title')
    Add New Director
@endsection


<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Add New Director</h2>
                </div>

                <a href="{{ route('directors.index') }}" class="sign__btn sign__btn--small" style="color: white;">Back to List</a>

                <div class="catalog catalog--1" style="margin-top: 20px;">
                    <form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--add">
                        @csrf
                        <div class="mb-3">
                            <label for="director_name" class="form-label" style="color: white;">Director Name:</label>
                            <input type="text" id="director_name" name="director_name" class="sign__input" value="{{ old('director_name') }}" >
                           @error('director_name')
                           <span class="text-danger">{{$message}}</span>
                               
                           @enderror
                            
                        </div>

                        <div class="mb-3">
                            <label for="biography" class="form-label" style="color: white;">Biography:</label>
                            <textarea id="biography" name="biography" class="sign__textarea" >{{ old('biography') }}</textarea>
                            @error('biography')
                            <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>

                        

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="sign__btn sign__btn--small" style="color: rgb(252, 251, 251);">Add New Director</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
