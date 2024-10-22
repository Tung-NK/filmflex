@extends('admin.layout.home')

@section('title')
    @parent
    Update genres
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Edit Genres</h2>
                        <span class="main__title-stat">33,452 Total</span>
                        <div class="main__title-wrap">
                            <a href="{{ route('genres.index') }}" class="main__title-link main__title-link--wrap">List Genres</a>
                            <select class="filter__select" name="sort" id="filter__sort">
                                <option value="0">Date created</option>
                                <option value="1">Rating</option>
                                <option value="2">Views</option>
                            </select>
                            <!-- search -->
                            <form action="#" class="main__title-form">
                                <input type="text" placeholder="Find genres...">
                                <button type="button">
                                    <i class="ti ti-search"></i>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('genres.update', $genres) }}" method="POST" enctype="multipart/form-data"
                        class="sign__form sign__form--add">
                        @csrf
                        @method('PUT')
                            <div class="col-12">
                                <div class="sign__group">
                                    {{-- <label for="">Genre name</label> --}}
                                    <input type="text" name="genre_name" class="sign__input" placeholder="genres name"
                                        value="{{ old('genre_name', $genres->genre_name) }}">
                                    @error('genre_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
{{-- 
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <textarea name="description" class="sign__textarea" placeholder="Description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-12 ">
                                        {{-- in anh cu --}}
                                        <div class="catalog__text">
                                            <img src="{{ asset('storage/' . $genres->genre_poster) }}" width="100px" height="80px" alt="{{ $genres->genre_name }}">
                                        </div>
                                        <div class="sign__group">
                                            <div class="sign__gallery">
                                                <label id="gallery1" for="sign__gallery-upload">{{ old('genre_poster', $genres->genre_name) }}</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="genre_poster"
                                                    class="sign__gallery-upload" type="file"
                                                    accept=".png, .jpg, .jpeg">

                                            </div>
                                            @error('genre_poster')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6">

                                    </div>

                            <div class="col-12">
                                <button type="submit"class="sign__btn sign__btn--small">Update genres</button>
                            </div>
                    </form>

                </div>
                <!-- end form -->
            </div>
        </div>
    </main>
    <!-- end main content -->

</body>
