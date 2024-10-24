@extends('admin.layout.home')

@section('title')
    Add New Actor
@endsection


<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2> Add Actor</h2>
                    <span class="main__title-stat">14,452 Total</span>
                    <div class="main__title-wrap">
                     
                    <a href="{{ route('actors.index') }}"
                                    class="main__title-link main__title-link--wrap">Back to List</a> 
                        <select class="filter__select" name="sort" id="filter__sort">
                            <option value="0">Date created</option>
                            <option value="1">Rating</option>
                            <option value="2">Views</option>
                        </select>
                        <!-- search -->
                        <form action="#" class="main__title-form">
                            <input type="text" placeholder="Find movie / tv series..">
                            <button type="button">
                                <i class="ti ti-search"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
                </div>
            </div>
            <!-- end main title -->
            <div class="col-12">
                
                <div class="catalog catalog--1" style="margin-top: 20px;">
                    <form action="{{ route('actors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="actor_name" class="form-label " style="color: white;">Actor Name:</label>
                            <input type="text" id="actor_name" name="actor_name" class="sign__input " value="{{ old('actor_name') }}" >
                            @if ($errors->has('actor_name'))
                            <span class="text-danger">{{ $errors->first('actor_name') }}</span>
                            @endif
                            
                        </div>

                        <div class="mb-3">
                            <label for="biography" class="form-label" style="color: white;">Biography:</label>
                            <textarea id="biography" name="biography" class="sign__textarea" >{{ old('biography') }}</textarea>
                            @if ($errors->has('biography'))
                            <span class="text-danger">{{ $errors->first('biography') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 sign__gallery">
                        <label for="image" class="form-label text-white">Upload Image Actor</label>
                        <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                       
                        
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

