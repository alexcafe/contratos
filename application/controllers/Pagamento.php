<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Controller gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/controllers.html
*/

class Pagamento extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['pagamento_model','funcoes','contrato_model','pessoa_model',]);
        $this->load->database();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        //$data['lista_pagamento'] = $this->pagamento_model->get_pagamento();
        $contratos = $this->contrato_model->get_contrato();
        $data['contratos'] = $contratos;

        $this->load->view('templates/top');
		$this->load->view('templates/menu');
        $this->load->view('pagamento/lista_pagamentos', $data);
    }

    public function details($contrato_id)
    {
        $details_contrato = $this->contrato_model->get_contrato($contrato_id);
        $data['contrato'] = $details_contrato[0];

        $pagamentos = $this->pagamento_model->get_pagamento($contrato_id);

        //Conversão de campos para formatos de visualização do usuário
        if($pagamentos)
        {
            foreach ($pagamentos as $p) {
                $p->valor = $this->funcoes->valor_monetario($p->valor );
                $p->vencimento = $this->funcoes->date_sql_to_view($p->vencimento );
            }
        }

        $data['pagamentos'] = $pagamentos;



        $this->load->view('templates/top');
		$this->load->view('templates/menu');
        $this->load->view('pagamento/view_pagamento', $data);
    }

    public function create($contrato_id)
    {
        if ($this->ion_auth->logged_in())
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $details_contrato = $this->contrato_model->get_contrato($contrato_id);
            $details_contrato[0]->valor = $this->funcoes->valor_monetario($details_contrato[0]->valor );
            $data['contrato'] = $details_contrato[0];

            //Dados dos valores e saldos do contrato
            $saldo_contrato                     =       $this->contrato_model->get_saldo_contrato($contrato_id);
            $pagamentos_recebidos               =       $this->pagamento_model->get_pagamentos_contrato($contrato_id,'Pago');
            $pagamentos_emitidos                =       $this->pagamento_model->get_pagamentos_contrato($contrato_id,'Emitido');
            $pagamentos                         =       $this->pagamento_model->get_pagamentos_contrato($contrato_id);
            $data['saldo_contrato']             =       $this->funcoes->valor_monetario($saldo_contrato);
            $data['pagamentos_recebidos']       =       $pagamentos_recebidos != NULL ? $this->funcoes->valor_monetario($pagamentos_recebidos) : '0,00';
            $data['pagamentos_emitidos']        =       $pagamentos_emitidos != NULL ? $this->funcoes->valor_monetario($pagamentos_emitidos) : '0,00';
            $data['pagamentos']                 =       $pagamentos != NULL ? $this->funcoes->valor_monetario($pagamentos) : '0,00';

            $this->form_validation->set_rules('valor', 'Valor', 'callback_verificar_saldo_contrato');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/top');
                $this->load->view('templates/menu');
                $this->load->view('pagamento/create_pagamento', $data);

            }
            else
            {
                $this->pagamento_model->set_pagamento('create');
                $this->session->set_flashdata('message_success_pagamento', 'Pagamento registrado com sucesso.');
                redirect("/pagamentos/visualizar/{$contrato_id}");
            }
        }
        else
        {
          $this->session->set_flashdata('message', 'Acesso negado.');
          redirect("login", 'refresh');
        }
    }

    public function verificar_saldo_contrato()
    {
        $contrato_id = $this->input->post('contrato_id');
        $valor = $this->input->post('valor');
        $valor = floatval($this->funcoes->valor_sql($valor));
        $saldo_contrato = $this->contrato_model->get_saldo_contrato($contrato_id);


        if (floatval($saldo_contrato) < $valor)
        {
            $this->form_validation->set_message('verificar_saldo_contrato', 'Saldo de contrato insuficiente.');
            $return = FALSE;
        }
        else
        {
            $return = TRUE;
        }

        return $return;
        
    }

    function delete($id)
    {
        if ($this->ion_auth->logged_in())
        {
            $contrato_id = $this->pagamento_model->get_contratoid_with_pagamentoid($id);
            $this->pagamento_model->delete_pagamento($id);
            $this->session->set_flashdata('message_success_pagamento', 'Pagamento Excluído com Sucesso.');
            redirect("/pagamentos/visualizar/{$contrato_id}");
        }
        else
        {
            $this->session->set_flashdata('message', 'Acesso negado.');
            redirect("login", 'refresh');
        }
    }

}