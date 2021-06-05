{tag}
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Controller gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais: https://www.codeigniter.com/user_guide/general/controllers.html
*/

class {name} extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('{entity}_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['lista_{entity}'] = $this->{entity}_model->get_{entity}();

        $this->load->view('templates/header', $data);
        $this->load->view('{entity}/index', $data);
        $this->load->view('templates/footer');
    }

    public function details($unique = NULL, $message = FALSE)
    {
        $data['{entity}'] = $this->{entity}_model->get_{entity}($unique);
        $data['message'] = $message;

        if (empty($data['{entity}']))
        {
                show_404();
        }
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('{entity}/details',$data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('CAMPO_1', 'Campo 1', 'required');
        $this->form_validation->set_rules('CAMPO_2', 'Campo 2', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('{entity}/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $id = $this->{entity}_model->set_{entity}();
            $this->details($id, "{entity} criada com sucesso!");
        }
    }

}