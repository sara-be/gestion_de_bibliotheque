<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="/css/adminLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  </head>
  <body>
    <main>
 
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

               <?php $validation = \Config\Services::validation(); ?>
                 <form method="POST" action="<?= route_to('admin.login.handler') ?>" autocomplete="off" class="sign-in-form">
                      <?= csrf_field() ?>

                      <?php if(!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">$times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('fail') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">$times;</span>
                </button>
            </div>
        <?php endif; ?>
                       <div class="logo">
                         
                           
                           <a href="#" class="logo"><i class="fas fa-book" id="bookly"></i></a>
                           <h4>bookly</h4>
                       </div>
                       <div class="heading">
                          <h2>Re-bienvenue Mon Admin</h2>
                       </div>
                       <div class="actual-form">
                       <div class="input-wrap">
                           <input id="login_id"  minlength="4" class="input-field" type="email" name="login_id"   placeholder="Email or username" />
                           <?php if($validation->getError('login_id')): ?>
                                 <div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">
                                   <?= $validation->getError('login_id') ?>
                                 </div>
                           <?php endif; ?>
                       </div>
                       <div class="input-wrap">
                           <input id="password" minlength="4" class="input-field" type="password" name="password"  autocomplete="off"  placeholder="Password"/>
                            <?php if($validation->getError('password')): ?>
                              <div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">
                                <?= $validation->getError('password') ?>
                             </div>
                           <?php endif; ?>
                       </div>
                       <button type="submit" class="sign-btn">Se connecter</button>
                           <div>
 

</div>








                             </div>

          </div>

          <div class="carousel">
            <div class="images-wrapper">
            <img src="<?php echo base_url('img/vert.jpeg'); ?>" class="image img-1 show" alt="" />


            </div>


          </div>
        </div>
      </div>
    </main>

    <script src="/js/adminLogin.js"></script>
  </body>
</html>
