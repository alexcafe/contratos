<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div>
                        <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/logo/rqh.png" alt="Logo" width="100 px"></a>
                    </div>
                    <h1 class="auth-title">Login.</h1>
                    <p class="auth-subtitle mb-5">Faça login com seus dados que você inseriu durante o registro.</p>

                    <?php if($message): ?>
                    <div class="alert alert-danger alert-dismissible show fade" ><?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif;?>
                      <?php echo form_open("login");?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="identity" class="form-control form-control-xl" placeholder="Usuário">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Senha">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" name="remember" id="remember">
                            <label class="form-check-label text-gray-600" for="remember">
                              Mantenha-me conectado
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Entrar</button>
                      <?php echo form_close();?>
                    <!-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Não tem conta? <a href="auth-register.html"
                                class="font-bold">Inscreva-se</a>.
                        </p>
                        <p><a class="font-bold" href="<?php echo base_url(); ?>recuperar_senha">Esqueceu a senha?</a></p>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>
<script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</html>