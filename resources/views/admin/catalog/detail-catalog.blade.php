@extends('admin.layout.home')
@section('title')
    @parent
    Chi tiết phim
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Detail movie</h2>
                    </div>
                </div>
                <!-- end main title -->
                <!-- form -->
                <div class="col-12">
                    <form action="#" class="sign__form sign__form--add">
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Title"
                                                value="{{ $movie->title }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <textarea id="text" name="text" class="sign__textarea" placeholder="Description" readonly>{{ $movie->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <div class="sign__gallery mb-4">
                                                <label id="gallery1" for="sign__gallery-upload">
                                                    {{ $movie->poster_url }}</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="gallery"
                                                    class="sign__gallery-upload" type="text"
                                                    accept=".png, .jpg, .jpeg" multiple="" readonly>

                                            </div>
                                            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt=""
                                                width="700px
                                                ">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        {{-- <div class="sign__group">
                                                <input type="text" class="sign__input"
                                                    placeholder="Link to the background (1920x1280)">
                                            </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Age"
                                                value="{{ $movie->age_rating }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Release date"
                                                value="{{ $movie->release_date }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Duration"
                                                value="{{ $movie->duration }}" readonly>
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
                                                    class="sign__video-upload" type="text"
                                                    accept="video/mp4,video/x-m4v,video/*" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- end movie -->
                                    <video width="640" height="360" controls>
                                        <source src="{{ asset('storage/' . $movie->trailer_url) }}" type="video/mp4">
                                    </video>
                                </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </main>
    <!-- end main content -->

</body>
