<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?php echo lang('change_password_heading');?></h3>
                            <!-- p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                                custom styles,
                                sizing, focus states, and more.</p -->
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <?php if($message): ?>
                    <div class="alert alert-danger alert-dismissible show fade" ><?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif;?>
                </div>
                <section class="section">
                    <div class="card">
                        <!--div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div-->

                        <div class="card-body">

                          <?php echo form_open("alterar_senha",['id'=>'form1','class'=>'needs-validation','novalidate'=>'']);?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="old_password"><?php echo lang('change_password_old_password_label');?></label>
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Enter email">
                                            <div class="invalid-feedback">
                                              <i class="bx bx-radio-circle"></i>
                                              Por favor, preencha o campo cidade.
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                                      <input type="password" class="form-control" id="new_password"
                                          placeholder="Enter email">
                                          <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Por favor, preencha o campo cidade.
                                          </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="new_password_confirm"><?php echo lang('change_password_new_password_confirm_label');?></label>
                                      <input type="text" class="form-control" id="new_password_confirm"
                                          placeholder="Enter email">
                                          <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Por favor, preencha o campo cidade.
                                          </div>
                                  </div>
                                </div>
                            </div>
                            <br/>
                            <?php echo form_input($user_id);?>
                            <button class="btn btn-primary" type="submit"><?php echo lang('change_password_submit_btn');?></button>
                          <?php echo form_close();?>
                        </div>
                    </div>
                </section>

                <!-- validations start -->
                <section id="input-validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Validation States</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>You can indicate invalid and valid form fields with
                                                <code>.is-invalid</code> and
                                                <code>.is-valid</code>. Note that <code>.invalid-feedback</code> is also
                                                supported
                                                with these classes.
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="valid-state">Valid State</label>
                                            <input type="text" class="form-control is-valid" id="valid-state"
                                                placeholder="Valid" value="Valid" required>
                                            <div class="valid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                This is valid state.
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="invalid-state">Invalid State</label>
                                            <input type="text" class="form-control is-invalid" id="invalid-state"
                                                placeholder="Invalid" value="Invalid" required>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                This is invalid state.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- validations end -->

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
    </script>
</body>

</html>