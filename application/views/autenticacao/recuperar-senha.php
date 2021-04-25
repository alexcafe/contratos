<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/rqh.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title"><?php echo lang('forgot_password_heading');?></h1>
                    <p class="auth-subtitle mb-5">Insira seu e-mail e enviaremos o link de redefinição de senha.</p>

                    <?php if($message): ?>
                    <div class="alert alert-danger alert-dismissible show fade" ><?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif;?>

                    <?php echo form_open("recuperar_senha");?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="identity" id="identity" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5"><?php echo lang('forgot_password_submit_btn');?></button>
                    <?php echo form_close();?>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Lembra-se de sua conta? <a href="<?php echo base_url(); ?>login" class="font-bold">Login</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>