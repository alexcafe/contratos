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
                            <h3>Visualizar Contrato</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('/contratos');?>">Pessoas</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Visualizar Contrato</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                      <div style="text-align:right; padding: 10px;">
                        <a href="<?php echo site_url('/contratos');?>" class="btn btn-secondary rounded-pill">Voltar</a>
                      </div>  
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informações do Contrato - <?php echo $contrato->codigo ;?></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Cliente:</strong> <?php echo $contrato->nome_pessoa;?></p>
                            <p><strong>Tipo de Contrato:</strong> <?php echo $contrato->tipo_contrato_nome;?></p>
                            <p><strong>Escopo:</strong> <?php echo $contrato->escopo;?></p>
                            <p><strong>Formalizado:</strong> <?php echo $contrato->formalizado;?></p>
                            <p><strong>Situação:</strong> <?php echo $contrato->situacao;?></p>
                            <p><strong>Valor:</strong> <?php echo 'R$ ' . $contrato->valor;?></p>
                            <p><strong>Forma de Pagamento:</strong> <?php echo $contrato->forma_pagamento;?></p>
                            <?php if($contrato->inicio_contrato) :?>
                              <p><strong>Início do Contrato:</strong> <?php echo $contrato->inicio_contrato;?></p>
                            <?php endif;?>
                            <?php if($contrato->fim_contrato) :?>
                              <p><strong>Fim do Contrato:</strong> <?php echo $contrato->fim_contrato;?></p>
                            <?php endif;?> 
                            <?php if($contrato->observacao) :?>
                              <p><strong>Observação:</strong> <?php echo $contrato->observacao;?></p>
                            <?php endif;?>
                            <?php if($contrato->fiscal) :?>
                              <p><strong>Fiscal:</strong> <?php echo $contrato->fiscal;?></p>
                            <?php endif;?>
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