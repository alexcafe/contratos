<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12">
					<h3>Novo Pagamento -- <?php echo "{$contrato->nome_pessoa} ({$contrato->codigo})";?></h3>
				</div>
      </div>
      <div class="row">
				<div class="col-12">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php echo site_url('/pagamentos');?>">Pagamentos</a></li>
							<li class="breadcrumb-item"><a href="<?php echo site_url('/pagamentos/visualizar/'.$contrato->id);?>">Visualizar
									Pagamentos</a></li>
							<li class="breadcrumb-item active" aria-current="page">Novo Pagamento</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div style="text-align:right; padding: 10px;">
					<a href="<?php echo site_url('/pagamentos/visualizar/' . $contrato->id);?>" class="btn btn-secondary rounded-pill">Voltar</a>
				</div>
			</div>
		</div>

    <section class="section">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3>Valor do Contrato: <?php echo "R$ {$contrato->valor}"; ?></h3>
            </div>
            <div class="card-body">
              <h5>Saldo: <?php echo "R$ {$saldo_contrato}"; ?></h5>
              <h5>Pagamentos: <?php echo "R$ {$pagamentos}"; ?></h5>
              <p><i><?php echo "(Pago: R$ {$pagamentos_recebidos}; Emitido: R$ {$pagamentos_emitidos})"; ?></i></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
            <h3>Pagamentos x Orçamento</h3>
            </div>
            <div class="card-body">
              <div id="chart-visitors-profile"></div>
            </div>
          </div>
        </div>
      </div>
			
    </section>

		<!-- validations start -->
		<section id="input-validation">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<?php echo form_open("pagamentos/novo/{$contrato->id}",['id'=>'form1','class'=>'needs-validation','novalidate'=>'']); ?>
                <input type="hidden" name="contrato_id" value="<?php echo $contrato->id;?>">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="form-label" for="valor">Valor do Pagamento</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text">R$</span>
                      <input type="text" id="valor" class="form-control dinheiro" name="valor" style="text-align:right;"
                        placeholder="0,00" value="<?php echo set_value('valor'); ?>" required>
                      <div class="invalid-feedback val" style="padding-top: 6px;">
                        <i class="bx bx-radio-circle"></i>
                        <?php echo form_error('valor') ? form_error('valor') : 'Por favor, preencha o campo Valor.';?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label class="form-label" for="nf">Número da Nota Fiscal</label>
                    <input type="text" id="nf" class="form-control" maxlength="100" name="nf"
                      placeholder="Digite o número da nota fiscal..." value="<?php echo set_value('nf'); ?>">
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      Por favor, preencha o campo Nota Fiscal.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label class="form-label" for="vencimento">Vencimento</label>
                    <div class="input-group mb-3">
                      <input type="date" id="vencimento" class="form-control" name="vencimento"
                        value="<?php echo set_value('vencimento'); ?>">
                      <span class="input-group-text" title="Clique para limpar o vencimento"
                        onclick="limpar_vencimento()">
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                          <use
                            xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#x-circle" />
                        </svg>
                      </span>
                      <div class="invalid-feedback dt_ini">
                        <i class="bx bx-radio-circle"></i>
                        <?php echo form_error('vencimento'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label class="form-label" for="status">Status</label>
                    <fieldset class="form-group">
                      <select class="form-select js-choice" required id="status" name="status">
                        <option value="">Selecione o status...</option>
                        <option value="Emitido" <?php echo set_select('status', 'Emitido');?>>Emitido</option>
                        <option value="Pago" <?php echo set_select('status', 'Pago');?>>Pago</option>
                        <option value="Vencido" <?php echo set_select('status', 'Vencido');?>>Vencido</option>
                      </select>
                    </fieldset>
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      Por favor, selecione o status do pagamento.
                    </div>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label class="form-label" for="forma_pagamento">Forma de Pagamento</label>
                    <fieldset class="form-group">
                      <select class="form-select js-choice" id="forma_pagamento" name="forma_pagamento">
                        <option value="">Selecione uma forma de pagamento...</option>
                        <option value="Dinheiro" <?php echo set_select('forma_pagamento', 'Dinheiro');?>>Dinheiro</option>
                        <option value="Boleto" <?php echo set_select('forma_pagamento', 'Boleto');?>>Boleto</option>
                        <option value="Transferência" <?php echo set_select('forma_pagamento', 'Transferência');?>>
                          Transferência</option>
                        <option value="Pix" <?php echo set_select('forma_pagamento', 'Pix');?>>Pix</option>
                        <option value="Outros" <?php echo set_select('forma_pagamento', 'Outros');?>>Outros</option>
                      </select>
                    </fieldset>
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      Por favor, selecione uma forma de pagamento.
                    </div>
                  </div>

                </div>
                
                
                <div class="buttons" style="float:right; padding: 15px 10px">
                  <button id="registrar" class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
							<?php echo form_close(); ?>
						</div>


					</div>
				</div>
				<!-- </div> -->
			</div>
		</section>
		<!-- validations end -->

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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/mask/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets/mask/jquery.mask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/dayjs/dayjs.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts_pagamento.js"></script>
<script>

  <?php
    $orcamento_fl       =   str_replace('.','', $contrato->valor); 
    $orcamento_fl       =   preg_replace('/,(\d{2})$/', '.$1', $orcamento_fl);
      
    $pagamentos_fl      =   str_replace('.','', $pagamentos); 
    $pagamentos_fl      =   preg_replace('/,(\d{2})$/', '.$1', $pagamentos_fl);
      
    $saldo_fl           =   str_replace('.','', $saldo_contrato); 
    $saldo_fl           =   preg_replace('/,(\d{2})$/', '.$1', $saldo_fl);
  ?>
  
  let orcamento         =   <?=$orcamento_fl;?>;
  let pagamentos        =   <?=$pagamentos_fl?>;
  let saldo             =   <?=$saldo_fl?>;
      
  let saldo_perc        =   ((100 * saldo) / orcamento);
  saldo_perc            =   saldo_perc.toFixed(1);
  let pagamentos_perc   =   ((100 * pagamentos) / orcamento);
  pagamentos_perc       =   pagamentos_perc.toFixed(1);

  if(orcamento >= 0 && orcamento < 25)
  {
    orc_color = '#e52929';
    pag_color = '#ad2626';
  }
  else if(orcamento >= 25 && orcamento < 50)
  {
    orc_color = '#e5a627';
    pag_color = '#f7e11b';
  }
  else
  {
    orc_color = '#435ebe';
    pag_color = '#55c6e8';
  }

  let optionsVisitorsProfile  = {
    series: [parseFloat(saldo_perc), parseFloat(pagamentos_perc)],
    labels: ['Orçamento', 'Pagamentos'],
    colors: [orc_color,pag_color],
    chart: {
      type: 'donut',
      width: '100%',
      height:'350px'
    },
    legend: {
      position: 'bottom'
    },
    plotOptions: {
      pie: {
        donut: {
          size: '30%'
        }
      }
    }
  }

  var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile);
  chartVisitorsProfile.render();
</script>
</body>

</html>
