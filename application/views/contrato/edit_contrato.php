<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<?php if($this->session->flashdata('message_success_contrato')): ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <?php echo $this->session->flashdata('message_success_contrato'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
				<?php endif;?>
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Editar Cadastro - Contratos</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php echo site_url('/contratos');?>">Contratos</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Editar Contrato</li>
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

		<!-- validations start -->
		<section id="input-validation">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Contrato: <?php echo $contrato->codigo ;?></h4>
						</div>

						<div class="card-body">
							<?php echo form_open("contratos/editar/{$contrato->id}",['id'=>'form1','class'=>'needs-validation','novalidate'=>'']); ?>
							<!-- <div class="row">
                            <h4 class="card-title" style="padding-bottom:10px">Identificação</h4>
                          </div> -->
							<input type="hidden" name="contrato_id" value="<?php echo $contrato->id;?>">
							<div class="row">
								<div class="col-sm-8 form-group">
									<label class="form-label" for="tipo_contrato_id">Tipo de Contrato</label>
									<fieldset class="form-group">
										<select class="form-select js-choice" required id="tipo_contrato_id"
											name="tipo_contrato_id">
											<option value="">Selecione uma opção...</option>
											<?php foreach($tipo_contrato as $tc): ?>
											<option value="<?php echo $tc->id; ?>"
												<?php echo set_select('tipo_contrato_id', $tc->id, $contrato->tc_id === $tc->id);?>>
												<?php echo htmlentities($tc->nome); ?></option>
											<?php endforeach; ?>
										</select>
									</fieldset>
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, selecione o tipo de pessoa.
									</div>
								</div>
								<div class="col-sm-4 form-group">
									<label class="form-label" for="formalizado">Formalização</label>
									<fieldset class="form-group">
										<select class="form-select js-choice" required id="formalizado"
											name="formalizado">
											<option value="">Selecione uma opção...</option>
											<option value="s"
												<?php echo set_select('formalizado', 's', $contrato->formalizado === 's');?>>
												Sim</option>
											<option value="n"
												<?php echo set_select('formalizado', 'n', $contrato->formalizado === 'n');?>>
												Não</option>
										</select>
									</fieldset>
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, selecione se o contrato é formalizado ou não.
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<div class="form-group mb-3">
										<label for="escopo" class="form-label">Escopo</label>
										<textarea class="form-control" id="escopo" maxlength="500" name="escopo"
											rows="3" placeholder="Informe o escopo..."
											required><?php echo htmlentities($contrato->escopo); ?></textarea>
										<div class="invalid-feedback" style="padding-top: 6px;">
											<i class="bx bx-radio-circle"></i>
											Por favor, preencha o campo Escopo.
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<!-- <h4 class="card-title" style="padding: 15px 0 10px 11px">Endereço</h4> -->
								<div class="col-sm-4 form-group">
									<label class="form-label" for="situacao">Situação</label>
									<fieldset class="form-group">
										<select class="form-select js-choice" required id="situacao" name="situacao">
											<option value="">Selecione uma opção...</option>
											<option value="Assinatura"
												<?php echo set_select('situacao', 'Assinatura', $contrato->situacao === 'Assinatura');?>>
												Assinatura</option>
											<option value="Assinado"
												<?php echo set_select('situacao', 'Assinado', $contrato->situacao === 'Assinado');?>>
												Assinado</option>
											<option value="Vigente"
												<?php echo set_select('situacao', 'Vigente', $contrato->situacao === 'Vigente');?>>
												Vigente</option>
											<option value="Vencendo"
												<?php echo set_select('situacao', 'Vencendo', $contrato->situacao === 'Vencendo');?>>
												Vencendo</option>
											<option value="Vencido"
												<?php echo set_select('situacao', 'Vencido', $contrato->situacao === 'Vencido');?>>
												Vencido</option>
											<option value="Informal"
												<?php echo set_select('situacao', 'Informal', $contrato->situacao === 'Informal');?>>
												Informal</option>
										</select>
									</fieldset>
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, selecione a situação do contrato.
									</div>
								</div>
								<div class="col-sm-4 form-group">
									<label class="form-label" for="valor">Valor do Contrato</label>
									<div class="input-group mb-3">
										<span class="input-group-text">R$</span>
										<input type="text" id="valor" class="form-control dinheiro" name="valor"
											style="text-align:right;" placeholder="0,00"
											value="<?php echo htmlentities($contrato->valor); ?>" required>
										<div class="invalid-feedback" style="padding-top: 6px;">
											<i class="bx bx-radio-circle"></i>
											Por favor, preencha o campo Valor do Contrato.
										</div>
									</div>

								</div>
								<div class="col-sm-4 form-group">
									<label class="form-label" for="forma_pagamento">Forma de Pagamento</label>
									<fieldset class="form-group">
										<select class="form-select js-choice" required id="forma_pagamento"
											name="forma_pagamento">
											<option value="">Selecione uma opção</option>
											<option value="u"
												<?php echo set_select('forma_pagamento', 'u', $contrato->forma_pagamento === 'u');?>>
												Pagamento Único</option>
											<option value="m"
												<?php echo set_select('forma_pagamento', 'm', $contrato->forma_pagamento === 'm');?>>
												Pagamento Mensal</option>
										</select>
									</fieldset>
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, selecione a Forma de Pagamento.
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label class="form-label" for="inicio_contrato">Data de Início</label>
									<div class="input-group mb-3">
										<input type="date" id="inicio_contrato" class="form-control"
											name="inicio_contrato" value="<?php echo $contrato->inicio_contrato; ?>">
										<span class="input-group-text" title="Clique para limpar a data de início"
											onclick="limpar_data_inicial()">
											<svg class="bi" width="1em" height="1em" fill="currentColor">
												<use
													xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#x-circle" />
											</svg>
										</span>
										<div class="invalid-feedback dt_ini">
											<i class="bx bx-radio-circle"></i>
											<?php echo form_error('inicio_contrato'); ?>
										</div>
									</div>
								</div>
								<div class="col-sm-3 form-group">
									<label class="form-label" for="fim_contrato">Data Final</label>
									<div class="input-group mb-3">
										<input type="date" id="fim_contrato" class="form-control" name="fim_contrato"
											value="<?php echo $contrato->fim_contrato; ?>">
										<span class="input-group-text" title="Clique para limpar a data final"
											onclick="limpar_data_final()">
											<svg class="bi" width="1em" height="1em" fill="currentColor">
												<use
													xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#x-circle" />
											</svg>
										</span>
										<div class="invalid-feedback dt_fim">
											<i class="bx bx-radio-circle"></i>
											<?php echo form_error('fim_contrato'); ?>
										</div>
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="form-label" for="pessoa_id">Contratante</label>
									<fieldset class="form-group">
										<select class="form-select js-choice" required id="pessoa_id" name="pessoa_id">
											<option value="">Selecione uma opção...</option>
											<?php foreach($pessoa as $p): ?>
											<option value="<?php echo $p->id; ?>"
												<?php echo set_select('pessoa_id', $p->id, $contrato->p_id === $p->id);?>>
												<?php echo htmlentities($p->nome); ?></option>
											<?php endforeach; ?>
										</select>
									</fieldset>
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, selecione o tipo de pessoa.
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<label class="form-label" for="fiscal">Fiscal</label>
									<input type="text" id="fiscal" maxlength="400" class="form-control" name="fiscal"
										placeholder="Digite o nome do Fiscal..."
										value="<?php echo htmlentities($contrato->fiscal); ?>">
									<div class="invalid-feedback">
										<i class="bx bx-radio-circle"></i>
										Por favor, preencha o campo Fiscal.
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<div class="form-group mb-3">
										<label for="observacao" class="form-label">Observação</label>
										<textarea class="form-control" id="observacao" maxlength="19000"
											name="observacao" rows="3"
											placeholder="Digite a observação que desejar..."><?php echo htmlentities($contrato->observacao); ?></textarea>
										<div class="invalid-feedback" style="padding-top: 6px;">
											<i class="bx bx-radio-circle"></i>
											Por favor, preencha o campo Observação.
										</div>
									</div>
								</div>
							</div>
							<div class="buttons" style="float:right; padding: 15px 10px">
                                <button id="registrar" class="btn btn-primary" type="submit">Atualizar</button>  
                                <?php if (! sizeof ($anexo) > 0): ?>  
                                    <a href="<?php echo base_url() . "contratos/editar/{$contrato->id}/upload_anexo"; ?>" class="btn btn-outline-primary">Inserir Anexo(s)</a>
                                <?php endif; ?>
							</div>
							<?php echo form_close(); ?>
						</div>


					</div>
				</div>
				<!-- </div> -->
			</div>
		</section>
		<!-- validations end -->
        <?php if (sizeof ($anexo) > 0): ?>                                        
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4>Gerenciar Anexos</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Anexo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($anexo as $a): ?>
                                <tr>
                                    <td>
                                        <?php echo '<a href="'.
                                            site_url("uploads/")
                                            .$a->anexo.
                                           '"   target="_blank">'.
                                           htmlentities($a->anexo).
                                           '</a><br/>';
                                        ?>
                                    </td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#danger" type="button" data-bs-whatever="<?php echo base_url() . "contratos/editar/{$contrato->id}/delete_anexo/{$a->id}"; ?>">
                                            <span class="badge bg-danger">Excluir</span>
                                        </a>
                                    </td>
                                </tr>

                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="buttons" style="float:right;">
                            <a href="<?php echo base_url() . "contratos/editar/{$contrato->id}/upload_anexo"; ?>" class="btn btn-outline-primary">Inserir Anexo(s)</a>
                        </div>
                    </div>

                </div>

            </section>
						<script src="<?php echo base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
						<script>
								//Construtor de Data Tables
								const dataTable = new simpleDatatables.DataTable("#table1", {
								searchable: true,

								});
						</script>
        <?php endif; ?>

	</div>

    <!--Danger theme Modal -->
    <div class="modal fade text-left" id="danger" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Excluir Anexo
                    </h5>
                    <button type="button" class="close"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este anexo?
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Não</span>
                    </button>
                    <a id='deletar-modal' href='' type="button" class="btn btn-danger ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Sim</span>
                    </a>
                </div>
            </div>
        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/mask/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets/mask/jquery.mask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts_contrato.js"></script>
<script>
    //Ação da modal que recebe o endereço de link para conclusão de exclusão
    var modaldanger = document.getElementById('danger')
    modaldanger.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        sim_modal=document.getElementById("deletar-modal")
        sim_modal.href=recipient
    })
</script>

</body>
