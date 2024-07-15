   <!-- Content -->
   <main class="main">

       <div class="container mt-90 mt-md-30">
           <div class="row">
               <div class="col-xl-10 col-lg-12 m-auto">
                   <section class="mb-50">
                       <div class="row">
                           <div class="col-xl-9 col-md-12 mx-auto">
                               <div class="contact-from-area padding-20-row-col">
                                   <h5 class="text-blue text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Send Message</h5>
                                   <h2 class="section-title mt-15 mb-10 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Drop Us a Line</h2>
                                   <div class="row mt-50">
                                       <div class="col-md-4 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                           <img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/headset-color.svg" alt="">
                                           <p class="text-muted font-xs mb-10">Phone</p>
                                           <p class="mb-0 font-lg">
                                               <?= PROJECT_PHONE ?>
                                           </p>
                                       </div>
                                       <div class="col-md-4 mt-sm-30 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                           <!-- <img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-email.svg" alt=""> -->
                                           <!-- <p class="text-muted font-xs mb-10">Email</p> -->
                                           <p class="mb-0 font-lg">
                                               <!-- <?= PROJECT_EMAIL ?> -->
                                           </p>
                                       </div>
                                       <div class="col-md-4 mt-sm-30 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                                           <img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/plane-color.svg" alt="">
                                           <p class="text-muted font-xs mb-10">Address</p>
                                           <p class="mb-0 font-lg">
                                               <?= PROJECT_ADDRESS ?>
                                           </p>
                                       </div>
                                   </div>
                                   <form class="contact-form-style mt-80" id="contact-form" action="#" method="post">
                                       <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                           <div class="col-lg-6 col-md-6">
                                               <div class="input-style mb-20">
                                                   <input name="name" placeholder="First Name" type="text" />
                                               </div>
                                           </div>
                                           <div class="col-lg-6 col-md-6">
                                               <div class="input-style mb-20">
                                                   <input name="email" placeholder="Your Email" type="email" />
                                               </div>
                                           </div>
                                           <div class="col-lg-6 col-md-6">
                                               <div class="input-style mb-20">
                                                   <input name="telephone" placeholder="Your Phone" type="tel" />
                                               </div>
                                           </div>
                                           <div class="col-lg-6 col-md-6">
                                               <div class="input-style mb-20">
                                                   <input name="subject" placeholder="Subject" type="text" />
                                               </div>
                                           </div>
                                           <div class="col-lg-12 col-md-12 text-center">
                                               <div class="textarea-style mb-30">
                                                   <textarea name="message" placeholder="Message"></textarea>
                                               </div>
                                               <button class="submit submit-auto-width" type="submit">Send message</button>
                                           </div>
                                       </div>
                                   </form>
                                   <p class="form-messege"></p>
                               </div>
                           </div>
                       </div>
                   </section>
               </div>
           </div>
       </div>