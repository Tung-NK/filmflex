@extends('admin.layout.home')

@section('title')
    Actor
@endsection


<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- menu bên trái -->
            

            <!-- nội dung chính -->
            
                <div class="main__title">
                    <h2>Actor</h2>
                    <span class="main__title-stat">{{ $data->total() }} Total</span>
                    <div class="main__title-wrap">
                        <a href="{{ route('actors.create') }}" class="main__title-link main__title-link--wrap">Add Actor</a>
                        <select class="filter__select" name="sort" id="filter__sort">
                            <option value="0">Date created</option>
                            <option value="1">Rating</option>
                            <option value="2">Views</option>
                        </select>
                        <!-- search -->
                        <form action="{{ route('actors.index') }}" method="GET" class="main__title-form" id="searchForm">
                            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Find actor by name.." value="{{ request('search') }}">
                            <div id="searchSuggestions" class="search-suggestions" style="display: none;"></div>
                        </form>
                        <!-- end search -->
                    </div>
                </div>

                <!-- Thông báo tìm kiếm -->
                @if ($searchMessage)
                    <div class="alert alert-success">
                        {{ $searchMessage }}
                    </div>
                @endif


                <div class="col-12">
                <div class="catalog catalog--1">
                    <table class="catalog__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Actor Name</th>
                                <th>Biography</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td><div class="catalog__text">{{ $item->id }}</div></td>
                                <td><div class="catalog__text">{{ $item->actor_name }}</div></td>
                                <td><div class="catalog__text">{{ $item->biography }}</div></td>
                                <td>
                                    <div class="catalog__text">
                                        <img src="{{ asset('storage/' . $item->image) }}" width="100px"  alt="{{ $item->actor_name }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">
                                        @if(!$item->trashed())
                                            <span style="color: green;">Active</span>
                                        @else
                                            <span style="color: red;">Inactive</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        @if(!$item->trashed())
                                            <div style="display: flex; align-items: center;">
                                                <a href="{{ route('actors.edit', $item->id) }}" class="catalog__btn catalog__btn--edit  mb-3 mt-6" style="height: 40px; padding: 0 10px; line-height: 40px;">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('actors.destroy', $item->id) }}" method="POST" style="display:inline; margin-left: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="catalog__btn catalog__btn--delete" style="height: 40px; padding: 0 10px; line-height: 40px;" onclick="return confirm('Are you sure you want to delete this actor?');">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div style="display: flex; align-items: center;">
                                                <form action="{{ route('actors.restore', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="catalog__btn " style="color: #28a745; background: none; border: none; height: 40px; padding: 0 10px; line-height: 40px; ">
                                                        <i class="ti ti-refresh" style="font-size: 1.5rem;"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('actors.forceDelete', $item->id) }}" method="POST" style="display:inline; margin-left: 5px;" onclick="return confirm('Are you sure you want to delete this actor?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="catalog__btn" style="background: none; border: none; height: 40px; padding: 0 10px; line-height: 40px;">
                                                        <i class="ti ti-trash" style="color: red;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
            <!-- paginator -->
           <div class="col-12">
               <div class="main__paginator d-flex justify-content-between align-items-center text-white">
                   <!-- amount -->
                   <span class="main__paginator-pages">
                       Showing Page {{ $currentPage }} of {{ $totalPages }}
                   </span>
                   <!-- end amount -->

                   <ul class="paginator">
                       <li class="paginator__item paginator__item--prev {{ $currentPage == 1 ? 'disabled' : '' }}">
                           <a href="{{ $currentPage > 1 ? route('actors.index', ['page' => $currentPage - 1, 'search' => request('search')]) : '#' }}">
                               <i class="ti ti-chevron-left"></i>
                           </a>
                       </li>
                       
                       @for ($i = 1; $i <= $totalPages; $i++)
                           <li class="paginator__item {{ $i == $currentPage ? 'paginator__item--active' : '' }}">
                               <a href="{{ route('actors.index', ['page' => $i, 'search' => request('search')]) }}">{{ $i }}</a>
                           </li>
                       @endfor

                       <li class="paginator__item paginator__item--next {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                           <a href="{{ $currentPage < $totalPages ? route('actors.index', ['page' => $currentPage + 1, 'search' => request('search')]) : '#' }}">
                               <i class="ti ti-chevron-right"></i>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
           <!-- end paginator -->
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            let query = $(this).val().trim();
            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('actors.index') }}",
                    method: "GET",
                    data: { search: query },
                    success: function(data) {
                        let suggestions = '';
                        data.forEach(function(actor) {
                            suggestions += `
                                <a href="#" class="suggestion-item" data-id="${actor.id}">
                                    <img src="{{ asset('storage/') }}/${actor.image}" width="50px" height="50px" alt="${actor.actor_name}">
                                    <span>${actor.actor_name}</span>
                                </a>`;
                        });
                        $('#searchSuggestions').html(suggestions).show();
                    }
                });
            } else {
                $('#searchSuggestions').hide();
            }
        });

            $(document).on('click', '.suggestion-item', function() {
                let actorId = $(this).data('id');
                let actorName = $(this).text().trim();
                $('#searchInput').val(actorName);
                $('#searchSuggestions').hide();
                $.ajax({
                    url: "{{ route('actors.index') }}",
                    method: "GET",
                    data: { search: actorName },
                    success: function(response) {
                        $('#searchForm').submit(); 
                    }
                });
            });

    });
</script>

<style>
    
    .search-suggestions {
        border: 1px solid  #222027;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        background-color: #222027;
        position: absolute;
        z-index: 1000;
        width: calc(100% - 0rem); 
    }

    .suggestion-item {
        display: flex;
        align-items: center;
        padding: 10px;
        text-decoration: none ;
        color: white;
    }

    .suggestion-item:hover {
        background-color: #222027;
        border: 3px solid orange;
    }

    .suggestion-item img {
        margin-right: 10px;
        border-radius: 50%;
    }
</style>

