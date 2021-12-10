<?php
class Contrato extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['funcoes','contrato_model','pessoa_model','anexo_model']);
    $this->load->database();
    $this->load->helper('url','form','url_helper');
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
      $contratos = $this->contrato_model->get_contrato();
      $data['contratos'] = $contratos;

      //Laço para inserir máscaras
      $i = 0;
      foreach ($contratos as $key => $c) {
        $data['contratos'][$i]->valor = $this->funcoes->valor_view($c->valor );
        $i++;
      }

      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('contrato/lista_contratos', $data);
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function create_contrato()
  {
    if ($this->ion_auth->logged_in())
    {
      $data['tipo_contrato'] = $this->contrato_model->get_tipo_contrato();
      $data['pessoa'] = $this->pessoa_model->get_pessoa();
      $this->form_validation->set_rules('fim_contrato', 'Fim de Contrato', 'callback_validar_data_final');
      if ( ! $this->form_validation->run())
      {
        // $data = $this->security->xss_clean($data);
        $this->load->view('templates/top');
			  $this->load->view('templates/menu');
			  $this->load->view('contrato/create_contrato', $data);
      }
      else
      {      
        $this->contrato_model->set_contrato('create');
        $this->session->set_flashdata('message_success_contrato', 'Contrato Cadastrado com Sucesso.');
        redirect('/contratos');
      }

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function validar_data_final()
  {
    if($this->input->post('fim_contrato'))
    {
      if($this->input->post('inicio_contrato'))
      {
        $data1 = date('Y-m-d H:i:s', strtotime($this->input->post('inicio_contrato')));
        $data2 = date('Y-m-d H:i:s', strtotime($this->input->post('fim_contrato')));
        if ($data1 > $data2)
        {
          $this->form_validation->set_message('validar_data_final', 'A data de início do contrato não pode ser após a data final.');
          $return = FALSE;
        }
        else
        {
          $return = TRUE;
        }
      }
      else
      {
        $this->form_validation->set_message('validar_data_final', 'Preencha a data de início do contrato.');
        $return = FALSE;
      }
    }
    else
    {
      $return = TRUE;
    }
    return $return;
  }

  function delete_contrato($contrato_id)
  {
    if ($this->ion_auth->logged_in())
    {
      $this->contrato_model->delete_contrato($contrato_id);
      $this->session->set_flashdata('message_success_contrato', 'Contrato Excluído com Sucesso.');
      redirect('/contratos');
    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function editar_contrato($contrato_id)
  {
    if ($this->ion_auth->logged_in())
    {
      $data['tipo_contrato'] = $this->contrato_model->get_tipo_contrato();
      $data['pessoa'] = $this->pessoa_model->get_pessoa();
      $details_contrato = $this->contrato_model->get_contrato($contrato_id);
      $details_contrato[0]->valor = $this->funcoes->valor_view($details_contrato[0]->valor );
      $details_contrato[0]->formalizado = $details_contrato[0]->formalizado == 'Sim' ? 's' : 'n';
      $details_contrato[0]->forma_pagamento = $details_contrato[0]->forma_pagamento == 'Mensal' ? 'm' : 'u';

      $data['anexo'] = $this->anexo_model->get_anexo($contrato_id);
      //var_dump($data['anexo']);die;
      
      //var_dump($details_contrato[0]);die();
      $data['contrato'] = $details_contrato[0];
      $this->form_validation->set_rules('escopo', 'Escopo', 'required');
      if ( ! $this->form_validation->run())
      {
          // $data = $this->security->xss_clean($data);
        $this->load->view('templates/top');
        $this->load->view('templates/menu');
        $this->load->view('contrato/edit_contrato',$data);
      }
      else
      {
        //$data = $this->input->post();
        //var_dump($data);die();
        
        $this->contrato_model->set_contrato('edit');
        $this->session->set_flashdata('message_success_contrato', 'Contrato Atualizado Com Sucesso.');
        redirect('/contratos');
      }

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }

  public function visualizar_contrato($contrato_id)
  {
    if ($this->ion_auth->logged_in())
    {
      //Inserção de máscaras em campos específicos para exibição ao usuário
      $data['tipo_contrato'] = $this->contrato_model->get_tipo_contrato();
      $data['pessoa'] = $this->pessoa_model->get_pessoa();
      $details_contrato = $this->contrato_model->get_contrato($contrato_id);
      $details_contrato[0]->valor = $this->funcoes->valor_monetario($details_contrato[0]->valor );
      $details_contrato[0]->inicio_contrato = $this->funcoes->date_sql_to_view($details_contrato[0]->inicio_contrato );
      $details_contrato[0]->fim_contrato = $this->funcoes->date_sql_to_view($details_contrato[0]->fim_contrato );

      $data['contrato'] = $details_contrato[0];
      $this->load->view('templates/top');
			$this->load->view('templates/menu');
			$this->load->view('contrato/view_contrato',$data);

    }
    else
    {
      $this->session->set_flashdata('message', 'Acesso negado.');
      redirect("login", 'refresh');
    }
  }
}
