@extends('admin.layout.home')

@section('title')
    @parent
    Danh sách quốc gia
@endsection

@push('styles')
@endpush


<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Users</h2>

                    <span class="main__title-stat">3,702 Total</span>

                    <div class="main__title-wrap">
                        <button type="button" data-bs-toggle="modal" class="main__title-link main__title-link--wrap"
                            data-bs-target="#addCountrie">Add countrie</button>

                        <select class="filter__select" name="sort" id="filter__sort">
                            <option value="0">Date created</option>
                            <option value="1">Pricing plan</option>
                            <option value="2">Status</option>
                        </select>

                        <!-- search -->
                        <form action="#" class="main__title-form">
                            <input type="text" placeholder="Find user..">
                            <button type="button">
                                <i class="ti ti-search"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
                </div>
            </div>
            <!-- end main title -->

            <!-- users -->
            <div class="col-12">
                <div class="catalog catalog--1">
                    @if (session('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="catalog__table">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Create at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($listCountrie as $key => $value)
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="catalog__text">{{ $listCountrie->firstItem() + $key }}</div>
                                    </td>
                                    <td>
                                        <div class="catalog__user d-flex justify-content-center">
                                            <div class="catalog__meta">
                                                <h3>{{ $value->name }}</h3>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <div class="catalog__text">{{ $value->created_at->format('d.m.Y') }}</div>
                                    </td>
                                    <td>
                                        <div class="catalog__btns d-flex justify-content-center">
                                            <button data-id="{{ $value->id }}"
                                                class="catalog__btn catalog__btn--edit" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                            <button data-id="{{ $value->id }}" type="button" data-bs-toggle="modal"
                                                class="catalog__btn catalog__btn--delete" data-bs-target="#modalDelete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users -->

            {{-- paginator- phân trang  --}}
            <div class="col-12">
                <div class="main__paginator">
                    <span class="main__paginator-pages">{{ $listCountrie->currentPage() }} of
                        {{ $listCountrie->lastPage() }}</span>

                    <ul class="main__paginator-list">
                        <li>
                            @if ($listCountrie->onFirstPage())
                                <span class="disabled">Prev</span>
                            @else
                                <a href="{{ $listCountrie->previousPageUrl() }}">Prev</a>
                            @endif
                        </li>
                        <li>
                            @if ($listCountrie->hasMorePages())
                                <a href="{{ $listCountrie->nextPageUrl() }}">Next</a>
                            @else
                                <span class="disabled">Next</span>
                            @endif
                        </li>
                    </ul>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($listCountrie->onFirstPage())
                                <span class="disabled"><i class="ti ti-chevron-left"></i></span>
                            @else
                                <a href="{{ $listCountrie->previousPageUrl() }}"><i class="ti ti-chevron-left"></i></a>
                            @endif
                        </li>

                        @for ($i = 1; $i <= $listCountrie->lastPage(); $i++)
                            <li
                                class="paginator__item {{ $i === $listCountrie->currentPage() ? 'paginator__item--active' : '' }}">
                                <a href="{{ $listCountrie->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="paginator__item paginator__item--next">
                            @if ($listCountrie->hasMorePages())
                                <a href="{{ $listCountrie->nextPageUrl() }}"><i class="ti ti-chevron-right"></i></a>
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

{{-- modal ADD --}}
<div class="modal fade" id="addCountrie" tabindex="-1" aria-labelledby="addCountrieLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <form action="{{ route('countrie.addCountrie') }}" class="modal__form" method="POST">
                    @csrf
                    <h4 class="modal__title" id="addCountrieLable">Add Countrie</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="sign__group">
                                <label class="sign__label" for="name">Name</label>
                                <input id="name" type="text" name="name" class="sign__input">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <button type="submit" class="sign__btn sign__btn--modal">ADD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <form action="{{ route('countrie.updateCountrie') }}" class="modal__form" method="POST">
                    @method('patch')
                    @csrf
                    <h4 class="modal__title" id="modalEditLable">Edit Countrie</h4>

                    <div class="row">
                        <input type="hidden" value="" id="idCountrieUpdate" name="idCountrie">
                        <div class="col-12">
                            <div class="sign__group">
                                <label class="sign__label" for="nameUpdate">Name</label>
                                <input id="nameUpdate" type="text" name="name" class="sign__input">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <button type="submit" class="sign__btn sign__btn--modal">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal delete --}}
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <h4 class="modal__title" id="modalDeleteLable">Warning</h4>

                <p class="modal__text">Do you want to delete?</p>
                <form action="" class="modal__form" id="ConfirmDelete" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal__btns">
                        <button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal"
                            aria-label="Close"><span>Close</span></button>
                        <button class="modal__btn modal__btn--apply" type="submit" data-bs-target="#modalDelete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        var exampleModal = document.getElementById('modalDelete');
    
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-id'); // Lấy ID cần xóa

            console.log(recipient); // Kiểm tra ID có đúng không 

            // Cập nhật action của form với URL và recipient
            // let ConfirmDelete = document.querySelector('#ConfirmDelete');
            // ConfirmDelete.setAttribute('action', '{{ route('countrie.deleteCountrie') }}?id=' + recipient);
        });

        var modalEdit = document.getElementById('modalEdit');
    
        modalEdit.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            var idCountrie = button.getAttribute('data-id'); // Lấy ID cần xóa

            // Call API
            let url = "{{route('countrie.detailCountrie')}}?id=" + idCountrie;
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                })
        });

        // var modalEdit = document.getElementById('modalEdit');
        // var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // modalEdit.addEventListener('show.bs.modal', function(event) {
        //     var button = event.relatedTarget;
        //     var idCountrie = button.getAttribute('data-id');

        //     let url = "{{ route('countrie.detailCountrie') }}?id=" + idCountrie;

        //     fetch(url, {
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'Accept': 'application/json',
        //                 'X-CSRF-TOKEN': csrfToken
        //             }
        //         })
        //         .then((response) => response.json())
        //         .then((data) => {
        //             console.log(data->name);

        //             // document.querySelector('#idCountrieUpdate').value = data.id
        //             // document.querySelector('#nameUpdate').value = data.name

        //         });
        // });
    </script>
@endpush
