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
                            <h3>Visualizar Pessoa</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('/pessoas');?>">Pessoas</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Visualizar Pessoa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                      <div style="text-align:right; padding: 10px;">
                        <a href="<?php echo site_url('/pessoas');?>" class="btn btn-secondary rounded-pill">Voltar</a>
                      </div>  
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $pessoa->nome;?></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>CPF/CNPJ:</strong> <?php echo $pessoa->cpf_cnpj;?></p>
                            <p><strong>Tipo de Pessoa:</strong> <?php echo $pessoa->tipo_pessoa;?></p>
                            <p><strong>Inscrição Estadual:</strong> <?php echo $pessoa->ie;?></p>
                            <p><strong>Endereço:</strong> <?php echo "{$pessoa->logradouro} {$pessoa->numero} {$pessoa->complemento}. {$pessoa->bairro}. CEP: {$pessoa->cep}. ". 
                                                           "{$pessoa->cidade}/{$pessoa->estado}";?></p>
                            <p><strong>Telefone:</strong> <?php echo $pessoa->telefone;?></p>
                            <p><strong>Celular:</strong> <?php echo $pessoa->celular;?></p>
                            <p><strong>E-mail:</strong> <?php echo $pessoa->email;?></p>
                            <p><strong>Responsável:</strong> <?php echo $pessoa->responsavel;?></p>
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

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>