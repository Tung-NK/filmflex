@extends('admin.layout.default')

@section('title')
    Actor
@endsection

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row">
          
            <div class="col-12">
                <div class="main__title">
                    <h2>Actor List</h2> 
                </div>
                <a href="{{ route('actors.create') }}" class="btn btn-warning">Add Actor</a>
            </div>
            
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
                                        <img src="{{ Storage::url($item->image) }}" width="100px" height="80px" alt="{{ $item->actor_name }}">
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
                                            <a href="{{ route('actors.edit', $item->id) }}" class="catalog__btn catalog__btn--edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('actors.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="catalog__btn catalog__btn--delete" onclick="return confirm('Are you sure you want to delete this actor?');">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                           
                                            <form action="{{ route('actors.restore', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="catalog__btn" style="color: #28a745; background: none; border: none;">
                                                    <i class="ti ti-refresh" style="font-size: 1.5rem;"></i> 
                                                </button>
                                            </form>
                                            <form action="{{ route('actors.forceDelete', $item->id) }}" method="POST" style="display:inline; " onclick="return confirm('Are you sure you want to delete this actor?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="catalog__btn" style="background: none; border: none;">
                                                    <i class="ti ti-trash" style="color: red;"></i> 
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
           
            <div class="col-12">
                <div class="main__paginator">
                   
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection
