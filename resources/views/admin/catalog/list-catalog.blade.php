@extends('admin.layout.home')
@section('title')
    @parent
    Danh sách phim
@endsection

<body>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Catalog</h2>

                        <span class="main__title-stat">{{ $totalMovie }} Total</span>

                        <div class="main__title-wrap">
                            <a href="{{ route('movie.catalog.create') }}"
                                class="main__title-link main__title-link--wrap">Add
                                item</a>

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
                                    <th>TITLE</th>
                                    <th>POSTER</th>
                                    <th>DESCRIPTION</th>
                                    <th>RELEASE DATE</th>
                                    <th>DURATION</th>
                                    <th>AGE RATING</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- mc = movie catalog --}}
                                @foreach ($movies as $mc)
                                    <tr>
                                        <td>
                                            <div class="catalog__text">{{ $mc->id }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $mc->title }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__text"><img
                                                    src="{{ asset('storage/' . $mc->poster_url) }}" alt="Logo"
                                                    width="100px">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $mc->description }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $mc->release_date }}</div>
                                        </td>

                                        <td>
                                            <div class="catalog__text">{{ $mc->duration }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">{{ $mc->age_rating }}</div>
                                        </td>
                                        <td>
                                            <div class="catalog__text">
                                                @if (!$mc->trashed())
                                                    <span style="color: green;">Active</span>
                                                @else
                                                    <span style="color: red;">Inactive</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="catalog__btns">

                                                @if (!$mc->trashed())
                                                    <button type="button" data-bs-toggle="modal"
                                                        class="catalog__btn catalog__btn--banned"
                                                        data-bs-target="#modal-status">
                                                        <i class="ti ti-lock"></i>
                                                    </button>
                                                    <a href="{{ route('movie.catalog.show', $mc->id) }}"
                                                        class="catalog__btn catalog__btn--view">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('movie.catalog.edit', $mc->id) }}"
                                                        class="catalog__btn catalog__btn--edit">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form action="{{ route('movie.catalog.destroy', $mc->id) }}"
                                                        method="POST" class="mt-3">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="catalog__btn catalog__btn--delete"
                                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('movie.movie.catalog.restore', $mc->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit"
                                                            class="catalog__btn catalog__btn--banned me-2 mt-3">
                                                            <i class="ti ti-refresh"></i>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('movie.movie.catalog.forceDelete', $mc->id) }}"
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
                        <span class="main__paginator-pages">{{ $movies->currentPage() }} of
                            {{ $movies->lastPage() }}</span>

                        <ul class="main__paginator-list">
                            <li>
                                @if ($movies->onFirstPage())
                                    <span class="disabled">Prev</span>
                                @else
                                    <a href="{{ $movies->previousPageUrl() }}">Prev</a>
                                @endif
                            </li>
                            <li>
                                @if ($movies->hasMorePages())
                                    <a href="{{ $movies->nextPageUrl() }}">Next</a>
                                @else
                                    <span class="disabled">Next</span>
                                @endif
                            </li>
                        </ul>

                        <ul class="paginator">
                            <li class="paginator__item paginator__item--prev">
                                @if ($movies->onFirstPage())
                                    <span class="disabled"><i class="ti ti-chevron-left"></i></span>
                                @else
                                    <a href="{{ $movies->previousPageUrl() }}"><i class="ti ti-chevron-left"></i></a>
                                @endif
                            </li>

                            @for ($i = 1; $i <= $movies->lastPage(); $i++)
                                <li
                                    class="paginator__item {{ $i === $movies->currentPage() ? 'paginator__item--active' : '' }}">
                                    <a href="{{ $movies->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="paginator__item paginator__item--next">
                                @if ($movies->hasMorePages())
                                    <a href="{{ $movies->nextPageUrl() }}"><i class="ti ti-chevron-right"></i></a>
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
