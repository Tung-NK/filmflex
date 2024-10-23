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
                    <h2>Showtime</h2>

                    <span class="main__title-stat">3,702 Total</span>

                    <div class="main__title-wrap">
                       <a href="" class="main__title-link main__title-link--wrap">Add showtime</a>

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
                    <table class="catalog__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>BASIC INFO</th>
                                <th>USERNAME</th>
                                <th>PRICING PLAN</th>
                                <th>COMMENTS</th>
                                <th>REVIEWS</th>
                                <th>STATUS</th>
                                <th>CRAETED DATE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="catalog__text">11</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Tess Harper</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Premium</div>
                                </td>
                                <td>
                                    <div class="catalog__text">13</div>
                                </td>
                                <td>
                                    <div class="catalog__text">1</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">05.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">12</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Gene Graham</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Free</div>
                                </td>
                                <td>
                                    <div class="catalog__text">1</div>
                                </td>
                                <td>
                                    <div class="catalog__text">15</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">05.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">13</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Rosa Lee</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Premium</div>
                                </td>
                                <td>
                                    <div class="catalog__text">6</div>
                                </td>
                                <td>
                                    <div class="catalog__text">6</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">04.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">14</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Matt Jones</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Free</div>
                                </td>
                                <td>
                                    <div class="catalog__text">11</div>
                                </td>
                                <td>
                                    <div class="catalog__text">15</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--red">Banned</div>
                                </td>
                                <td>
                                    <div class="catalog__text">04.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">15</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Brian Cranston</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Basic</div>
                                </td>
                                <td>
                                    <div class="catalog__text">0</div>
                                </td>
                                <td>
                                    <div class="catalog__text">0</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">04.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">16</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Louis Leterrier</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Free</div>
                                </td>
                                <td>
                                    <div class="catalog__text">2</div>
                                </td>
                                <td>
                                    <div class="catalog__text">1</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">03.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">17</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Son Gun</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Cinematic</div>
                                </td>
                                <td>
                                    <div class="catalog__text">65</div>
                                </td>
                                <td>
                                    <div class="catalog__text">0</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">02.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">18</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Jordana Brewster</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Premium</div>
                                </td>
                                <td>
                                    <div class="catalog__text">0</div>
                                </td>
                                <td>
                                    <div class="catalog__text">0</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--red">Banned</div>
                                </td>
                                <td>
                                    <div class="catalog__text">02.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">19</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Tyreese Gibson</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Premium</div>
                                </td>
                                <td>
                                    <div class="catalog__text">13</div>
                                </td>
                                <td>
                                    <div class="catalog__text">1</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--green">Approved</div>
                                </td>
                                <td>
                                    <div class="catalog__text">01.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="catalog__text">20</div>
                                </td>
                                <td>
                                    <div class="catalog__user">
                                        <div class="catalog__avatar">
                                            <img src="img/user.svg" alt="">
                                        </div>
                                        <div class="catalog__meta">
                                            <h3>Charlize Theron</h3>
                                            <span>email@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="catalog__text">Username</div>
                                </td>
                                <td>
                                    <div class="catalog__text">Free</div>
                                </td>
                                <td>
                                    <div class="catalog__text">1</div>
                                </td>
                                <td>
                                    <div class="catalog__text">15</div>
                                </td>
                                <td>
                                    <div class="catalog__text catalog__text--red">Banned</div>
                                </td>
                                <td>
                                    <div class="catalog__text">01.02.2023</div>
                                </td>
                                <td>
                                    <div class="catalog__btns">
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--banned" data-bs-target="#modal-status">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                        <a href="edit-user.html" class="catalog__btn catalog__btn--edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="main__paginator">
                    <!-- amount -->
                    <span class="main__paginator-pages">10 of 169</span>
                    <!-- end amount -->

                    <ul class="main__paginator-list">
                        <li>
                            <a href="#">
                                <i class="ti ti-chevron-left"></i>
                                <span>Prev</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Next</span>
                                <i class="ti ti-chevron-right"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            <a href="#"><i class="ti ti-chevron-left"></i></a>
                        </li>
                        <li class="paginator__item"><a href="#">1</a></li>
                        <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                        <li class="paginator__item"><a href="#">3</a></li>
                        <li class="paginator__item"><a href="#">4</a></li>
                        <li class="paginator__item"><span>...</span></li>
                        <li class="paginator__item"><a href="#">29</a></li>
                        <li class="paginator__item"><a href="#">30</a></li>
                        <li class="paginator__item paginator__item--next">
                            <a href="#"><i class="ti ti-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
</main>