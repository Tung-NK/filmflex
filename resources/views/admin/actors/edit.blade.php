@extends('admin.layout.home')

@section('title')
    Edit Actor
@endsection

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Edit Actor</h2>
                    <span class="main__title-stat">14,452 Total</span>
                    <div class="main__title-wrap">
                        <a href="{{ route('actors.index') }}" class="main__title-link main__title-link--wrap">List Actor</a>
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
                <div class="catalog catalog--1">
                    <form action="{{ route('actors.update', $actor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                                    <div class="mb-3">
                                        <label for="actor_name" class="form-label text-white">Actor Name:</label>
                                        <input type="text" id="actor_name" name="actor_name" class="form-control {{ $errors->has('actor_name') ? 'is-invalid' : '' }}" value="{{ old('actor_name', $actor->actor_name) }}" required>
                                        @if ($errors->has('actor_name'))
                                            <span class="text-danger">{{ $errors->first('actor_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label text-white">Image:</label>
                                        <div class="mb-2">
                                            @if ($actor->image)
                                                <img src="{{ asset('storage/' . $actor->image) }}" width="200px" height="160px" alt="{{ $actor->actor_name }}" class="mb-2">
                                            @endif
                                        </div>
                                        <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                        <small class="form-text text-white">Select a new image if you want to change it.</small>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="biography" class="form-label text-white">Biography:</label>
                                        <textarea id="biography" name="biography" class="form-control {{ $errors->has('biography') ? 'is-invalid' : '' }}" required>{{ old('biography', $actor->biography) }}</textarea>
                                        @if ($errors->has('biography'))
                                            <span class="text-danger">{{ $errors->first('biography') }}</span>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-warning" style="color: white;">Update Actor</button>
                                    </div>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
