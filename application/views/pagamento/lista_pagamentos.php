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
					<h3>Gerenciar Pagamentos</h3>
					<p class="text-subtitle text-muted">Clique em um dos contratos para gerenciar os pagamentos</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url();?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pagamentos</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body">

					<?php if ($contratos):?>
            <?php foreach ($contratos as $ct): ?>
            <div class="col-12">
              <a href="<?php echo site_url('pagamentos/visualizar/' . $ct->id);?>">
                <div class="alert alert-primary btn-primary">
                  <h4 class="alert-heading"><?php echo "{$ct->nome_pessoa} ({$ct->codigo})";?></h4>
                  <p><?php echo $ct->escopo;?></p>
                </div>
              </a>
            </div>
            <?php endforeach; ?>
					<?php else: ?>
					<h3>Não há contratos cadastrados.</h3>
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
