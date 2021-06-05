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
                            <h3>Gerenciamento de Pessoas</h3>
                            <p class="text-subtitle text-muted">Relação das Pessoas (Físicas e Jurídicas) Cadastradas</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Pessoas
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>CPF/CNPJ</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($pessoas as $pessoa): ?>
                                    <tr>
                                        <td><?php echo $pessoa->nome ?></td>
                                        <td><?php echo $pessoa->tipo_pessoa ?></td>
                                        <td><?php echo $pessoa->cpf_cnpj ?></td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr>

                                  <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
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
    <script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
      const dataTable = new simpleDatatables.DataTable("#table1", {
        searchable: true,
        
      })
    </script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>