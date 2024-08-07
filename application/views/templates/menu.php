<body style="background-color: #f2f7ff;">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <!-- <a href="#"><img src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
                            <h1>SIGECO</h1>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php echo $this->uri->segment(1)=='principal' ? 'active' : ''; ?>"">
                            <a href="<?php echo base_url(); ?>principal" class='sidebar-link <?php echo $this->uri->segment(2)=='principal' ? 'active' : ''; ?>'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $this->uri->segment(1)=='pessoas' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>pessoas" class="sidebar-link" >
                                <i class="bi bi-people-fill"></i>
                                <span>Gerenciar Pessoas</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $this->uri->segment(1)=='contratos' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>contratos" class="sidebar-link" >
                                <i class="bi bi-file-text"></i>
                                <span>Gerenciar Contratos</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $this->uri->segment(1)=='pagamentos' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>pagamentos" class="sidebar-link" >
                                <i class="bi bi-cash"></i>
                                <span>Gerenciar Pagamentos</span>
                            </a>
                        </li>
                        <hr/>

                        <li class="sidebar-title"><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>

        </div>
