@extends('admin.layout.default')
@section('content')

    <body>
        <!-- main content -->
        <main class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- main title -->
                    <div class="col-12">
                        <div class="main__title">
                            <h2>Add new item</h2>
                        </div>
                    </div>
                    <!-- end main title -->
                    <!-- form -->
                    <div class="col-12">
                        <form action="{{ route('movie.catalog.store') }}" method="POST" enctype="multipart/form-data"
                            class="sign__form sign__form--add">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-xl-7">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="sign__group">
                                                <input type="text" name="title" class="sign__input" placeholder="Title"
                                                    value="{{ old('title') }}">
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="sign__group">
                                                <textarea name="description" class="sign__textarea" placeholder="Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="sign__group">
                                                <div class="sign__gallery">
                                                    <label id="gallery1" for="sign__gallery-upload">Upload poster
                                                        (240x340)</label>
                                                    <input data-name="#gallery1" id="sign__gallery-upload" name="poster_url"
                                                        class="sign__gallery-upload" type="file"
                                                        accept=".png, .jpg, .jpeg">

                                                </div>
                                                @error('poster_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-12 col-md-6">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="sign__group">
                                                <input type="text" name="age_rating" class="sign__input"
                                                    placeholder="Age Rating" value="{{ old('age_rating') }}">
                                                @error('age_rating')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="sign__group">
                                                <input type="date" name="release_date" class="sign__input"
                                                    placeholder="Release Date" value="{{ old('release_date') }}">
                                                @error('release_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="sign__group">
                                                <input type="time" name="duration" class="sign__input"
                                                    placeholder="Duration" value="{{ old('duration') }}">
                                                @error('duration')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="sign__video">
                                                <label id="movie1" for="sign__video-upload">Upload video</label>
                                                <input data-name="#movie1" id="sign__video-upload" name="trailer_url"
                                                    class="sign__video-upload" type="file"
                                                    accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            @error('trailer_url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button type="submit"
                                                class="sign__btn sign__btn--small"><span>Publish</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- end form -->
                </div>
            </div>
        </main>
        <!-- end main content -->

    </body>
@endsection
