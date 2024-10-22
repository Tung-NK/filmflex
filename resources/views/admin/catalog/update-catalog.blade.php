@extends('admin.layout.home')
@section('title')
    @parent
    Chỉnh sửa phim
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Update movie</h2>
                    </div>
                </div>
                <!-- end main title -->
                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('movie.catalog.update', $movie->id) }}" class="sign__form sign__form--add"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" name="title" class="sign__input" placeholder="Title"
                                                value="{{ old('title', $movie->title) }}">
                                        </div>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <textarea name="description" class="sign__textarea" placeholder="Description">{{ old('description', $movie->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 ">
                                        <div class="sign__group">
                                            <div class="sign__gallery">
                                                <label id="gallery1"
                                                    for="sign__gallery-upload">{{ $movie->poster_url }}</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="poster_url"
                                                    class="sign__gallery-upload" type="file"
                                                    accept=".png, .jpg, .jpeg" multiple="">
                                            </div>
                                            @error('poster_url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt=""
                                                width="700px
                                                "
                                                class="mt-4">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" name="age_rating" class="sign__input"
                                                placeholder="Age Rating"
                                                value="{{ old('age_rating', $movie->age_rating) }}">
                                            @error('age_rating')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="date" name="release_date" class="sign__input"
                                                placeholder="Release Date"
                                                value="{{ old('release_date', $movie->release_date) }}">
                                            @error('release_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="time" name="duration" class="sign__input"
                                                placeholder="Duration" value="{{ old('duration', $movie->duration) }}">
                                            @error('duration')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <select class="sign__selectjs" id="sign__genre" multiple disabled>
                                                <option value="Action">Action</option>
                                                <option value="Animation">Animation</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Crime">Crime</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Historical">Historical</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Science-fiction">Science-fiction</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="Western">Western</option>
                                                <option value="Otheer">Otheer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- movie -->
                                    <div class="col-12">
                                        <div class="collapse show multi-collapse">
                                            <div class="sign__video">
                                                <label id="movie1"
                                                    for="sign__video-upload">{{ $movie->trailer_url }}</label>
                                                <input data-name="#movie1" id="sign__video-upload" name="trailer_url"
                                                    class="sign__video-upload" type="file"
                                                    accept="video/mp4,video/x-m4v,video/*">
                                                @error('trailer_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <video width="640" height="360" controls>
                                            <source src="{{ asset('storage/' . $movie->trailer_url) }}"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                    <!-- end movie -->

                                    <div class="col-12">
                                        <button type="submit"
                                            class="sign__btn sign__btn--small"><span>Update</span></button>
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
