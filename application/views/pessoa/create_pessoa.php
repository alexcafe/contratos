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
                  <h3>Novo Cadastro - Pessoas</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Input</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>

      <!-- validations start -->
      <section id="input-validation">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <!-- <h4 class="card-title">Input Validation States</h4> -->
                      </div>

                      <div class="card-body">
                        <?php echo form_open('pessoas/novo',['id'=>'form1','class'=>'needs-validation','novalidate'=>'']); ?>
                          <div class="row">
                            <h4 class="card-title" style="padding-bottom:10px">Identificação</h4>
                          </div>
                          <div class="row">
                              <div class="col-12 form-group">
                                  <label class="form-label" for="name">Nome</label>
                                  <input type="text" id="nome" class="form-control" maxlength="400" name="nome" placeholder="Digite o nome da pessoa..." value="" required>
                                  <div class="invalid-feedback">
                                      <i class="bx bx-radio-circle"></i>
                                      Por favor, preencha o campo nome.
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                              </div>
                              <div class="col-sm-4 form-group">
                                  <label class="form-label" for="cpf_cnpj">CPF/CNPJ</label>
                                  <input type="text" id="cpf_cnpj" class="form-control" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ da pessoa..." value="" required>
                                  <div class="invalid-feedback">
                                      <i class="bx bx-radio-circle"></i>
                                      Por favor, preencha o campo CPF/CNPJ.
                                  </div>
                              </div>
                              <div class="col-sm-4 form-group">
                                  <label class="form-label" for="ie">Inscrição Estadual</label>
                                  <input type="text" id="ie" class="form-control" name="ie" maxlength="20" placeholder="Digite a Inscrição Estadual..." value="">
                                  <div class="invalid-feedback">
                                      <i class="bx bx-radio-circle"></i>
                                      Por favor, preencha o campo Inscrição Estadual.
                                  </div>
                              </div>                                        
                              <div class="col-sm-4 form-group">
                                  <label class="form-label" for="tipo_pessoa">Tipo de Pessoa</label>
                                  <fieldset class="form-group">
                                      <select class="form-select js-choice" required id="tipo_pessoa" name="tipo_pessoa">
                                          <option value="">Física ou Jurídica</option>
                                          <option value="f">Física</option>
                                          <option value="j">Jurídica</option>
                                      </select>
                                  </fieldset>
                                  <div class="invalid-feedback">
                                      <i class="bx bx-radio-circle"></i>
                                      Por favor, selecione o tipo de pessoa.
                                  </div>
                              </div>

                          </div>
                          <div class="row">
                              <h4 class="card-title" style="padding: 15px 0 10px 11px">Endereço</h4>
                          </div>
                          <div class="row">
                            <div class="col-sm-10 form-group">
                                <label class="form-label" for="logradouro">Logradouro</label>
                                <input type="text" id="logradouro" class="form-control" name="logradouro" placeholder="Digite o Logradouro..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Logradouro.
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="form-label" for="numero">Número</label>
                                <input type="text" id="numero" class="form-control" name="numero" maxlength="7" placeholder="Digite o Número..." onkeypress="return onlynumber();" value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Número.
                                </div>
                            </div> 
                          </div>
                          <div class="row">
                            <div class="col-sm-5 form-group">
                                <label class="form-label" for="complemento">Complemento</label>
                                <input type="text" id="complemento" maxlength="100" class="form-control" name="complemento" placeholder="Digite o Complemento..." value="">
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Complemento.
                                </div>
                            </div>
                            <div class="col-sm-5 form-group">
                                <label class="form-label" for="bairro">Bairro</label>
                                <input type="text" id="bairro" maxlength="100" class="form-control" name="bairro" placeholder="Digite o Bairro..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Bairro.
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="form-label" for="cep">CEP</label>
                                <input type="text" id="cep" class="form-control mask-cep" name="cep" placeholder="Digite o CEP..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo CEP.
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-7 form-group">
                                <label class="form-label" for="cidade">Cidade</label>
                                <input type="text" id="cidade" maxlength="200" class="form-control" name="cidade" placeholder="Digite a Cidade..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Cidade.
                                </div>
                            </div>
                            <div class="col-sm-5 form-group">
                                  <label class="form-label" for="estado">Tipo de Pessoa</label>
                                  <fieldset class="form-group">
                                      <select class="form-select js-choice" required id="estado" name="estado">
                                      <option value="">Selecione um Estado</option>
                                      <option value="AC">Acre</option>
                                      <option value="AL">Alagoas</option>
                                      <option value="AP">Amapá</option>
                                      <option value="AM">Amazonas</option>
                                      <option value="BA">Bahia</option>
                                      <option value="CE">Ceará</option>
                                      <option value="DF">Distrito Federal</option>
                                      <option value="ES">Espírito Santo</option>
                                      <option value="GO">Goiás</option>
                                      <option value="MA">Maranhão</option>
                                      <option value="MT">Mato Grosso</option>
                                      <option value="MS">Mato Grosso do Sul</option>
                                      <option value="MG">Minas Gerais</option>
                                      <option value="PA">Pará</option>
                                      <option value="PB">Paraíba</option>
                                      <option value="PR">Paraná</option>
                                      <option value="PE">Pernambuco</option>
                                      <option value="PI">Piauí</option>
                                      <option value="RJ">Rio de Janeiro</option>
                                      <option value="RN">Rio Grande do Norte</option>
                                      <option value="RS">Rio Grande do Sul</option>
                                      <option value="RO">Rondônia</option>
                                      <option value="RR">Roraima</option>
                                      <option value="SC">Santa Catarina</option>
                                      <option value="SP">São Paulo</option>
                                      <option value="SE">Sergipe</option>
                                      <option value="TO">Tocantins</option>
                                      </select>
                                  </fieldset>
                                  <div class="invalid-feedback">
                                      <i class="bx bx-radio-circle"></i>
                                      Por favor, selecione o Estado.
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <h4 class="card-title" style="padding: 15px 0 10px 11px">Contato</h4>
                          </div>
                          <div class="row">
                            <div class="col-sm-3 form-group">
                                <label class="form-label" for="telefone">Telefone</label>
                                <input type="text" id="telefone" class="form-control mask-telefone" name="telefone" placeholder="Digite o Telefone..." value="">
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Telefone.
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label class="form-label" for="celular">Celular</label>
                                <input type="text" id="celular" class="form-control mask-celular" name="celular" placeholder="Digite o Celular..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Celular.
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" class="form-control" name="email" placeholder="Digite o Email..." value="" required>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Email.
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12 form-group">
                                <label class="form-label" for="responsavel">Responsável</label>
                                <input type="text" id="responsavel" class="form-control" maxlength="400" name="responsavel" placeholder="Digite o nome do Responsável..." value="">
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    Por favor, preencha o campo Responsável.
                                </div>
                            </div>
                          </div> 
                          <div class="buttons" style="float:right; padding: 15px 10px">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
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
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/mask/jquery.mask.js"></script>
  <script src="<?php echo base_url(); ?>assets/mask/jquery.mask.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script>
    // $(document).ready(function(){

    // });
    
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();

        var choices = new Choices('.js-choice');

        var choices2 = new Choices('.js-choice-remove', {
          removeItemButton: true,
        });

  </script>
</body>

</html>