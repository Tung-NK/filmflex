@extends('admin.layout.home')
@section('title')
    @parent
    Chi tiết admin
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Detail admin</h2>
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
                                            <label for="adminName" class="text-white mb-2">Name</label>
                                            <input type="text" id="adminName" class="sign__input"
                                                value="{{ $admin->name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminEmail" class="text-white mb-2">Email</label>
                                            <input type="text" id="adminEmail" class="sign__input"
                                                value="{{ $admin->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminPassword" class="text-white mb-2">Password (Hashed)</label>
                                            <input type="text" id="adminPassword" class="sign__input"
                                                value="{{ $admin->password }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminPhone" class="text-white mb-2">Phone</label>
                                            <input type="text" id="adminPhone" class="sign__input"
                                                value="{{ $admin->phone }}" readonly>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label for="adminAvatar" class="text-white mb-2">Avatar</label>
                                            <div class="sign__gallery mb-4">
                                                <label id="gallery1" for="sign__gallery-upload">
                                                    {{ $admin->avatar }}
                                                </label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="gallery"
                                                    class="sign__gallery-upload" type="text"
                                                    accept=".png, .jpg, .jpeg" multiple="" readonly>
                                            </div>
                                            <img src="{{ asset('storage/' . $admin->avatar) }}" alt="Admin Avatar"
                                                width="400px">
                                        </div>
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
