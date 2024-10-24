@extends('admin.layout.home')
@section('title')
    @parent
    Danh sách admin
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Admin</h2>
                        <span class="main__title-stat">{{ $totalAdmin }} Total</span>
                        <div class="main__title-wrap">
                            <a href="{{ route('admin-management.admins.create') }}"
                                class="main__title-link main__title-link--wrap">Add
                                Admin</a>

                            <select class="filter__select" name="sort" id="filter__sort">
                                <option value="0">Date created</option>
                                <option value="1">Rating</option>
                                <option value="2">Views</option>
                            </select>

                            <!-- search -->
                            <form action="#" class="main__title-form">
                                <input type="text" placeholder="Find movie">
                                <button type="button">
                                    <i class="ti ti-search"></i>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>
                    </div>
                </div>
                <!-- end main title -->

                <!-- items -->
                <div class="col-12">
                    <div class="catalog catalog--1">
                        <table class="catalog__table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>AVATAR</th>
                                    <th>EMAIL</th>
                                    <th>PASSWORD (HASHED)</th>
                                    <th>PHONE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- ad = movie catalog --}}
                                @foreach ($admin as $ad)
                                    <tr>
                                        <td>
                                            <div class="catalog__text">{{ $ad->user_id }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $ad->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__text"><img src="{{ asset('storage/' . $ad->avatar) }}"
                                                    alt="Logo" width="100px">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $ad->email }}</div>
                                        </td>

                                        <td>
                                            <div class="catalog__text">{{ $ad->password }}</div>
                                        </td>

                                        <td>
                                            <div class="catalog__text">{{ $ad->phone }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">
                                                @if (!$ad->trashed())
                                                    <span style="color: green;">Active</span>
                                                @else
                                                    <span style="color: red;">Inactive</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__btns">

                                                @if (!$ad->trashed())
                                                    <button type="button" data-bs-toggle="modal"
                                                        class="catalog__btn catalog__btn--banned"
                                                        data-bs-target="#modal-status">
                                                        <i class="ti ti-lock"></i>
                                                    </button>
                                                    <a href="{{ route('admin-management.admins.show', $ad->user_id) }}"
                                                        class="catalog__btn catalog__btn--view">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin-management.admins.edit', $ad->user_id) }}"
                                                        class="catalog__btn catalog__btn--edit">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin-management.admins.destroy', $ad->user_id) }}"
                                                        method="POST" class="mt-3">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="catalog__btn catalog__btn--delete"
                                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin-management.admin.restore', $ad->user_id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit"
                                                            class="catalog__btn catalog__btn--banned me-2 mt-3">
                                                            <i class="ti ti-refresh"></i>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('admin-management.admin.forceDelete', $ad->user_id) }}"
                                                        method="POST" style="display:inline; ">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="catalog__btn catalog__btn--delete me-2 mt-3"
                                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end items -->

                <!-- paginator -->
                <div class="col-12">
                    <div class="main__paginator">
                        <span class="main__paginator-pages">{{ $admin->currentPage() }} of
                            {{ $admin->lastPage() }}</span>

                        <ul class="main__paginator-list">
                            <li>
                                @if ($admin->onFirstPage())
                                    <span class="disabled">Prev</span>
                                @else
                                    <a href="{{ $admin->previousPageUrl() }}">Prev</a>
                                @endif
                            </li>
                            <li>
                                @if ($admin->hasMorePages())
                                    <a href="{{ $admin->nextPageUrl() }}">Next</a>
                                @else
                                    <span class="disabled">Next</span>
                                @endif
                            </li>
                        </ul>

                        <ul class="paginator">
                            <li class="paginator__item paginator__item--prev">
                                @if ($admin->onFirstPage())
                                    <span class="disabled"><i class="ti ti-chevron-left"></i></span>
                                @else
                                    <a href="{{ $admin->previousPageUrl() }}"><i class="ti ti-chevron-left"></i></a>
                                @endif
                            </li>

                            @for ($i = 1; $i <= $admin->lastPage(); $i++)
                                <li
                                    class="paginator__item {{ $i === $admin->currentPage() ? 'paginator__item--active' : '' }}">
                                    <a href="{{ $admin->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="paginator__item paginator__item--next">
                                @if ($admin->hasMorePages())
                                    <a href="{{ $admin->nextPageUrl() }}"><i class="ti ti-chevron-right"></i></a>
                                @else
                                    <span class="disabled"><i class="ti ti-chevron-right"></i></span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end paginator -->
            </div>
        </div>
    </main>
    <!-- end main content -->

    <!-- status modal -->
    <div class="modal fade" id="modal-status" tabindex="-1" aria-labelledby="modal-status" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal__content">
                    <form action="#" class="modal__form">
                        <h4 class="modal__title">Status change</h4>

                        <p class="modal__text">Are you sure about immediately change status?</p>

                        <div class="modal__btns">
                            <button class="modal__btn modal__btn--apply" type="button"><span>Apply</span></button>
                            <button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><span>Dismiss</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end status modal -->

    <!-- delete modal -->
    {{-- <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal__content">
                        <form action="#" class="modal__form">
                            <h4 class="modal__title">Item delete</h4>

                            <p class="modal__text">Are you sure to permanently delete this item?</p>

                            <div class="modal__btns">
                                <button class="modal__btn modal__btn--apply" type="button"><span>Delete</span></button>
                                <button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"><span>Dismiss</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- end delete modal -->


</body>
