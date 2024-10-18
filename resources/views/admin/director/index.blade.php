@extends('admin.layout.home')

@section('title')
    Director
@endsection


<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @session('status')                           
                <div class="alert alert-success ">
                    {{ session('status')}}
                </div>
                @endsession
                <div class="main__title">
                    <h2>Director List</h2>

                    <span class="main__title-stat">3,702 Total</span>

                    <div class="main__title-wrap">
                        <a href="{{ url('admin/directors/create') }}" class="main__title-link main__title-link--wrap">Add Director</a>

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

            
            <div class="col-12">
                <div class="catalog catalog--1">
                    <table class="catalog__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Director Name</th> 
                                <th>Biography</th> 
                                <th>Status</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($directors as $director)
                            <tr>
                                <td><div class="catalog__text">{{ $director->id }}</div></td>
                                <td><div class="catalog__text">{{ $director->director_name }}</div></td>
                                <td><div class="catalog__text">{{ $director->biography }}</div></td>
                                <td>
                                    <div class="catalog__text">
                                        @if(!$director->trashed())
                                            <span style="color: green;">Active</span> 
                                        @else
                                            <span style="color: red;">Inactive</span> 
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                       
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                        <i class="ti ti-lock"></i>
                                        </button>
                                            <a href="{{ route('directors.edit', $director->id) }}" class="catalog__btn catalog__btn--edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('directors.destroy', $director->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="catalog__btn catalog__btn--delete" onclick="return confirm('Are you sure you want to delete this director?');">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                     
                                    </div>
                                  
                                </td>
                            </tr>
                        @endforeach

                       
                        </tbody>
                    </table>
                </div>
            </div>

       
            <div class="col-12">
                <div class="main__paginator">
                    <span class="main__paginator-pages">{{ $directors->currentPage() }} of
                        {{ $directors->lastPage() }}</span>

                    <ul class="main__paginator-list">
                        <li>
                            @if ($directors->onFirstPage())
                                <span class="disabled">Prev</span>
                            @else
                                <a href="{{ $directors->previousPageUrl() }}">Prev</a>
                            @endif
                        </li>
                        <li>
                            @if ($directors->hasMorePages())
                                <a href="{{ $directors->nextPageUrl() }}">Next</a>
                            @else
                                <span class="disabled">Next</span>
                            @endif
                        </li>
                    </ul>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($directors->onFirstPage())
                                <span class="disabled"><i class="ti ti-chevron-left"></i></span>
                            @else
                                <a href="{{ $directors->previousPageUrl() }}"><i class="ti ti-chevron-left"></i></a>
                            @endif
                        </li>

                        @for ($i = 1; $i <= $directors->lastPage(); $i++)
                            <li
                                class="paginator__item {{ $i === $directors->currentPage() ? 'paginator__item--active' : '' }}">
                                <a href="{{ $directors->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="paginator__item paginator__item--next">
                            @if ($directors->hasMorePages())
                                <a href="{{ $directors->nextPageUrl() }}"><i class="ti ti-chevron-right"></i></a>
                            @else
                                <span class="disabled"><i class="ti ti-chevron-right"></i></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

