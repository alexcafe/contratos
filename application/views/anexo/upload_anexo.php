<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <?php if($msg_anexo): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert"><?php echo $msg_anexo; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endif;?>
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Upload de Anexos</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('/contratos');?>">Contratos</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url("/contratos/editar/{$contrato->id}");?>"><?php echo "Editar Contrato {$contrato->codigo}";?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload de Anexos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                      <div style="text-align:right; padding: 10px;">
                        <a href="<?php echo site_url("/contratos/editar/{$contrato->id}");?>" class="btn btn-secondary rounded-pill">Voltar</a>
                      </div>  
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo "Contrato: {$contrato->codigo}";?></h4>
                        </div>
                        <div class="card-body">
                          <?php echo form_open_multipart("anexo/create/{$contrato->id}", 'id="form-anexo"'); ?>
                            <input type="hidden" name="contrato_id" value="<?php echo $contrato->id;?>">
                            <div class="row">
                              <div class="col-12 form-group">
                                <label for="anexo" class="form-label">Anexo (insira até 5 anexos de uma vez) - Tamanho do arquivo: até 10MB cada</label>
                                <input class="form-control" type="file" name='anexo[]' id="anexo" multiple required>
                                <div class="invalid-feedback anexo">
                                  <i class="bx bx-radio-circle"></i>
                                  <?php echo form_error('anexo[]') ? form_error('anexo[]') : 'Por favor, insira ao menos um anexo.';?>
                                </div>
                              </div>
                            </div>
                            <div class="buttons" style="float:right; padding: 15px 10px">
                              <button id="registrar" class="btn btn-primary" type="submit">Inserir</button>
                            </div>
                          <?php echo form_close();?>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                  <div class="float-start">
                      <p>2021 &copy; RQH Soluções</p>
                  </div>
                  <div class="float-end">
                      <p>Sistema de Gestão de Contratos</p>
                  </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts_anexo.js"></script>
</body>

</html>