 <!-- footer -->
 <footer class="footer">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="footer__content">
                     <a href="index.html" class="footer__logo">
                         <img src="{{asset('assets_admin/img/logo2.svg')}}" alt="">
                     </a>

                     <span class="footer__copyright">© FILMFLEX, 2024—2025 <br> Create by <a
                             href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank">WD-47</a></span>

                     <nav class="footer__nav">
                         <a href="about.html">About Us</a>
                         <a href="contacts.html">Contacts</a>
                         <a href="privacy.html">Privacy policy</a>
                     </nav>

                     <button class="footer__back" type="button">
                         <i class="ti ti-arrow-narrow-up"></i>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- end footer -->

 <!-- plan modal -->
 <div class="modal fade" id="plan-modal" tabindex="-1" aria-labelledby="plan-modal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal__content">
                 <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                         class="ti ti-x"></i></button>

                 <form action="#" class="modal__form">
                     <h4 class="modal__title">Select plan</h4>

                     <div class="sign__group">
                         <label for="fullname" class="sign__label">Name</label>
                         <input id="fullname" type="text" name="name" class="sign__input"
                             placeholder="Full name">
                     </div>

                     <div class="sign__group">
                         <label for="email" class="sign__label">Email</label>
                         <input id="email" type="text" name="email" class="sign__input"
                             placeholder="example@domain.com">
                     </div>

                     <div class="sign__group">
                         <label class="sign__label" for="value">Choose plan:</label>
                         <select class="sign__select" name="value" id="value">
                             <option value="35">Premium - $34.99</option>
                             <option value="50">Cinematic - $49.99</option>
                         </select>

                         <span class="sign__text">You can spend money from your account on the renewal of the
                             connected packages, or to order cars on our website.</span>
                     </div>

                     <div class="sign__group">
                         <label class="sign__label">Payment method:</label>

                         <ul class="sign__radio">
                             <li>
                                 <input id="type1" type="radio" name="type" checked="">
                                 <label for="type1">Visa</label>
                             </li>
                             <li>
                                 <input id="type2" type="radio" name="type">
                                 <label for="type2">Mastercard</label>
                             </li>
                             <li>
                                 <input id="type3" type="radio" name="type">
                                 <label for="type3">Paypal</label>
                             </li>
                         </ul>
                     </div>

                     <button type="button" class="sign__btn sign__btn--modal">
                         <span>Proceed</span>
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- end plan modal -->
