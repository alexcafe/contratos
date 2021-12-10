<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
        <?php if($this->session->flashdata('message_success_pagamento')): ?>
            <div class="alert alert-success alert-dismissible show fade"><?php echo $this->session->flashdata('message_success_pagamento'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        <?php endif;?>
				<div class="col-12">
					<h3>Pagamentos -- <?php echo "{$contrato->nome_pessoa} ({$contrato->codigo})";?></h3>
					<p class="text-subtitle text-muted">Gerencie os pagamentos deste contrato</p>
				</div>
      </div>
      <div class="row">
				<div class="col-12">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php echo site_url();?>">Pagamentos</a></li>
							<li class="breadcrumb-item active" aria-current="page">Visualizar Pagamentos</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div style="text-align:right; padding: 10px;">
					<a href="<?php echo site_url('/pagamentos');?>" class="btn btn-secondary rounded-pill">Voltar</a>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body">

					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>Valor</th>
								<th>Vencimento</th>
								<th>Status</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($pagamentos as $pg): ?>
							<tr>
								<td><?php echo 'R$ ' . $pg->valor ?></td>
								<td><?php echo $pg->vencimento ?></td>
								<td><?php echo $pg->status ?></td>
								<td style="width:25%">
									<a type="button" href="<?php //echo site_url('/pessoas/visualizar/'. $pessoa->id);?>">
										<span class="badge bg-primary">Visualizar</span>
									</a>
									<a type="button" href="<?php //echo site_url('/pessoas/editar/'. $pessoa->id);?>">
										<span class="badge bg-warning">Editar</span>
									</a>
									<a data-bs-toggle="modal" data-bs-target="#danger" type="button"
										data-bs-whatever="<?php echo site_url('pagamentos/excluir/'. $pg->id);?>">
										<span class="badge bg-danger">Excluir</span>
									</a>
								</td>
							</tr>

							<?php endforeach;?>
						</tbody>
					</table>

					<div class="buttons" style="float:right; padding-top:20px;">
						<a href="<?php echo base_url() . "pagamentos/novo/{$contrato->id}"; ?>" class="btn btn-primary">Novo Pagamento</a>
					</div>

				</div>

			</div>
		</section>
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
                      Excluir Pagamento
                  </h5>
                  <button type="button" class="close"
                      data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                  </button>
              </div>
              <div class="modal-body">
                  Tem certeza que deseja excluir este pagamento?
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
<script src="<?php echo base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
	//Construtor de Data Tables
	const dataTable = new simpleDatatables.DataTable("#table1", {
		searchable: true,

	})

</script>
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

</html>
