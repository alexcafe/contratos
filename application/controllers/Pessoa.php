<?php
class Pessoa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['pessoa_model','funcoes']);
    $this->load->database();
    $this->load->helper('url', 'form','url_helper');
    $this->load->library(['ion_auth', 'form_validation']);

    if ($this->ion_auth->logged_in())
    {
      $this->acesso = TRUE;
    }
  }

  public function index()
  {
    if ($this->ion_auth->logged_in())
    {
      $pessoas = $this->pessoa_model->get_pessoa();
      $data['pessoas'] = $pessoas;

      //Laço para inserir máscara de cpf e cnpj
      $i = 0;
      foreach ($pessoas as $key => $p) {
        $data['pessoas'][$i]->cpf_cnpj = $this->funcoes->mascara_cpf_cnpj($p->cpf_cnpj );
        $i++;
      }

      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('pessoa/lista_pessoas', $data);
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function create_pessoa()
  {
    if ($this->ion_auth->logged_in())
    {
      $this->form_validation->set_rules('cpf_cnpj', 'CPF/CNPJ', 'callback_validar_cpf_cnpj');
      $this->form_validation->set_rules('sigla', 'Abreviação/Sigla', 'callback_validar_sigla');
      if ( ! $this->form_validation->run())
      {
        // $data = $this->security->xss_clean($data);
        $this->load->view('templates/top');
			  $this->load->view('templates/menu');
			  $this->load->view('pessoa/create_pessoa');
      }
      else
      {
        //$data = $this->input->post();
        //var_dump($data);die();
        
        $this->pessoa_model->set_pessoa('create');
        $this->session->set_flashdata('message_success_pessoa', 'Pessoa Cadastrada Com Sucesso.');
        redirect('/pessoas');
      }

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  function validar_cpf_cnpj()
  {
    $cpf_cpnj = NULL;
    $cpf_cnpj = $this->funcoes->limpa_numero($this->input->post('cpf_cnpj'));
    // var_dump($cpf_cnpj);die();
    if($this->pessoa_model->have_cpf_cnpj($cpf_cnpj))
    {
      $this->form_validation->set_message('validar_cpf_cnpj', 'CPF/CNPJ já cadastrado!');
      $return = FALSE;
    }
    else
    {
      $return = TRUE;
    }
    return $return;

  }

  function validar_sigla()
  {
    $sigla = NULL;
    $sigla = addslashes($this->input->post('sigla'));
    if ($this->pessoa_model->have_sigla($sigla)) 
    {
      $this->form_validation->set_message('validar_sigla', 'Abreviação/Sigla já cadastrada!');
      $return = FALSE;
    }
    else
    {
      $return = TRUE;
    }
    return $return;
  }

  function delete_pessoa($pessoa_id)
  {
    if ($this->ion_auth->logged_in())
    {
      $this->pessoa_model->delete_pessoa($pessoa_id);
      $this->session->set_flashdata('message_success_pessoa', 'Pessoa Excluída Com Sucesso.');
      redirect('/pessoas');
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function visualizar_pessoa($pessoa_id)
  {
    if ($this->ion_auth->logged_in())
    {
      //Inserção de máscaras em campos específicos para exibição ao usuário
      $details_pessoa = $this->pessoa_model->get_pessoa($pessoa_id);
      $details_pessoa[0]->cpf_cnpj = $this->funcoes->mascara_cpf_cnpj($details_pessoa[0]->cpf_cnpj );
      $details_pessoa[0]->telefone = $details_pessoa[0]->telefone ? $this->funcoes->mascara_tel($details_pessoa[0]->telefone) : NULL;
      $details_pessoa[0]->celular = $this->funcoes->mascara_cel($details_pessoa[0]->celular);
      $details_pessoa[0]->cep = $this->funcoes->mascara_cep($details_pessoa[0]->cep);

      $data['pessoa'] = $details_pessoa[0];
      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('pessoa/view_pessoa',$data);

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function editar_pessoa($pessoa_id)
  {
    if ($this->ion_auth->logged_in())
    {
      //Inserção de máscaras em campos específicos para exibição ao usuário
      $details_pessoa = $this->pessoa_model->get_pessoa($pessoa_id);
      $details_pessoa[0]->cpf_cnpj = $this->funcoes->mascara_cpf_cnpj($details_pessoa[0]->cpf_cnpj );
      $details_pessoa[0]->telefone = $details_pessoa[0]->telefone ? $this->funcoes->mascara_tel($details_pessoa[0]->telefone) : NULL;
      $details_pessoa[0]->celular = $this->funcoes->mascara_cel($details_pessoa[0]->celular);
      $details_pessoa[0]->cep = $this->funcoes->mascara_cep($details_pessoa[0]->cep);
      $details_pessoa[0]->tipo_pessoa = $details_pessoa[0]->tipo_pessoa == 'Pessoa Física' ? 'f' : 'j';

      //var_dump($details_pessoa[0]->tipo_pessoa);die();
      $data['pessoa'] = $details_pessoa[0];
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      if ( ! $this->form_validation->run())
      {
        // $data = $this->security->xss_clean($data);
      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('pessoa/edit_pessoa',$data);
      }
      else
      {
        //$data = $this->input->post();
        //var_dump($data);die();
        
        $this->pessoa_model->set_pessoa('edit');
        $this->session->set_flashdata('message_success_pessoa', 'Pessoa Atualizada Com Sucesso.');
        redirect('/pessoas');
      }

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }


}