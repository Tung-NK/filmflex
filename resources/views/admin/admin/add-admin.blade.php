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
                        <h2>Update admin</h2>
                    </div>
                </div>
                <!-- end main title -->
                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('admin-management.admins.store') }}" class="sign__form sign__form--add"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminName" class="text-white mb-2">Name</label>
                                            <input type="text" id="adminName" name="name" class="sign__input"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminEmail" class="text-white mb-2">Email</label>
                                            <input type="email" id="adminEmail" name="email" class="sign__input"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminPassword" class="text-white mb-2">Password</label>
                                            <input type="password" id="adminPassword" name="password"
                                                class="sign__input">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminPhone" class="text-white mb-2">Phone</label>
                                            <input type="text" id="adminPhone" name="phone" class="sign__input"
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminAvatar" class="text-white mb-2">Avatar</label>
                                            <div class="sign__gallery mb-1">
                                                <label id="gallery1" for="sign__gallery-upload"></label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="avatar"
                                                    class="sign__gallery-upload" type="file"
                                                    accept=".png, .jpg, .jpeg" multiple=""><br>
                                            </div>
                                            @error('avatar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
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
