<?php
class Comando extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    if ( ! $this->input->is_cli_request())
    {
      exit('Acesso permitido apenas pela linha de comando.');
    }
    $this->load->dbforge();
    $this->load->library('parser');
  }
  
  public function help()
  {
    $result = "\nOs seguintes comandos estão disponíveis:\n\n";
    // $result .= "\n> php index.php comando mvc \"nome\" \nCria migration, model, controller e diretorio de views com algumas views\n";
    // $result .= "\n> php index.php comando model \"nome\" \nCria um novo arquivo de model\n";
    // $result .= "\n> php index.php comando controller \"nome\" \nCria um novo arquivo de controller\n";
    // $result .= "\n> php index.php comando view \"nome\" \nCria um novo diretorio de views com algumas views\n";
    $result .= "\n> php index.php comando migration \"nome\" \nCria um novo arquivo de migration\n";
    $result .= "\n> php index.php comando migrate [\"numero_da_versao\"] \nRoda todas as migrations. O número de versão é opcional.\n";
    //$result .= "\n> php index.php comando importafontes \"host\" \"db\" \"user\" \"pass\" \nMigra fontes do setnof (informar host, banco, usuario e senha)\n";
    echo $result . PHP_EOL;
    //favor acrescentar ao Help novos comandos que forem gerados.
  }
  
  public function mvc($name)
  {
    $this->_make_migration_file($name);
    $this->_make_model_file($name);
    $this->_make_controller_file($name);
    $this->_make_view_directory($name);
    $this->_make_view_files($name);
  }
  
  public function model($name)
  {
    $this->_make_model_file($name);
  }
  
  public function controller($name)
  {
    $this->_make_controller_file($name);
  }
  
  public function view($name)
  {
    $this->_make_view_directory($name);
    $this->_make_view_files($name);
  }
  
  public function migration($name)
  {
    $this->_make_migration_file($name);
  }
  
  public function migrate($version = null)
  {
    $this->load->library('migration');
    
    if ($version !== null) {
      if ($this->migration->version($version) === FALSE)
      {
        show_error($this->migration->error_string());
      }
      else
      {
        echo 'Migrations executadas com sucesso.' . PHP_EOL;
      }
      
      return;
    }
    
    if ($this->migration->latest() === FALSE) {
      show_error($this->migration->error_string());
    }
    else
    {
      echo 'Migrations executadas com sucesso.' . PHP_EOL;
    }
  }
  
  // public function importafontes($host, $db, $user, $pass)
  // {
  //   //conecta no banco mysql do setnof e pega as fontes,
  //   //insere fontes (e seus dados) no nosso banco.
  //   //ESTE SCRIPT NAO CHECA DUPLICIDADE!!! CUIDADO!
    
  //   $this->db->trans_start();
  //   $total = 0;
  //   $conn = mysqli_connect($host, $user, $pass, $db);
  //   mysqli_query($conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  //   mysqli_set_charset($conn, 'utf8');
  //   if (mysqli_connect_errno())
  //   {
  //     echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
  //     return FALSE;
  //   }
  //   $result_fontes = mysqli_query(
  //     $conn, 
  //     'SELECT * FROM fonte'
  //   );
  //   $fontes = mysqli_fetch_all($result_fontes, MYSQLI_ASSOC);
  //   mysqli_free_result($result_fontes);
  //   $this->load->model('assessoria/fonte_model');
  //   /* esta parte não vai mais ser executada, era só por causa dos testes
  //   $this->db->query('TRUNCATE fonte');
  //   $this->db->query('TRUNCATE assunto_fonte');
  //   $this->db->query('TRUNCATE local_fonte');
  //   $this->db->query('TRUNCATE email_fonte');
  //   $this->db->query('TRUNCATE fone_fonte');
  //   $this->db->query('ALTER TABLE fonte AUTO_INCREMENT = 1');
  //   $this->db->query('ALTER TABLE fone_fonte AUTO_INCREMENT = 1');
  //   $this->db->query('ALTER TABLE assunto_fonte AUTO_INCREMENT = 1');
  //   $this->db->query('ALTER TABLE email_fonte AUTO_INCREMENT = 1');
  //   $this->db->query('ALTER TABLE local_fonte AUTO_INCREMENT = 1');
  //   */
  //   foreach($fontes as $fonte)
  //   {
  //     $total++;
  //     $nome = $fonte['nomeFonte'];
  //     if( ! $nome)
  //     {
  //       $nome = '(não informado)';
  //     }
  //     $descricao = $fonte['descricao'];
  //     if( ! $descricao)
  //     {
  //       $descricao = '(não informado)';
  //     }
  //     $result_telefones = mysqli_query($conn,
  //     'SELECT t.nomeTelefone 
  //     FROM telefone t 
  //     WHERE t.idTelefone in 
  //     (SELECT tf.idTelefone from telefonefonte tf where tf.idFonte = '.$fonte['idFonte'].')');
  //     $telefones = mysqli_fetch_all($result_telefones, MYSQLI_ASSOC);
  //     mysqli_free_result($result_telefones);
  //     $result_emails = mysqli_query($conn,
  //     'SELECT t.nomeEmail 
  //     FROM email t 
  //     WHERE t.idEmail in 
  //     (SELECT tf.idEmail from emailfonte tf where tf.idFonte = '.$fonte['idFonte'].')');
  //     $emails = mysqli_fetch_all($result_emails, MYSQLI_ASSOC);
  //     mysqli_free_result($result_emails);
  //     $result_assuntos = mysqli_query($conn,
  //     'SELECT t.nomeAssunto 
  //     FROM assunto t 
  //     WHERE t.idAssunto in 
  //     (SELECT tf.idAssunto from assuntofonte tf where tf.idFonte = '.$fonte['idFonte'].')');
  //     $assuntos = mysqli_fetch_all($result_assuntos, MYSQLI_ASSOC);
  //     mysqli_free_result($result_assuntos);
  //     $result_locais = mysqli_query($conn,
  //     'SELECT t.nomeLugar 
  //     FROM lugar t 
  //     WHERE t.idLugar in 
  //     (SELECT tf.idLugar from fontelugar tf where tf.idFonte = '.$fonte['idFonte'].')');
  //     $locais = mysqli_fetch_all($result_locais, MYSQLI_ASSOC);
  //     mysqli_free_result($result_locais);
  //     $this->fonte_model->importa_fonte(
  //       $nome,
  //       $descricao,
  //       $telefones,
  //       $emails,
  //       $assuntos,
  //       $locais
  //     );
  //   }
  //   $this->db->trans_complete();
  //   mysqli_close($conn);
  //   echo "\n".$total." fontes importadas.\n";
  //   return TRUE;
  // }
  ////////////////////////////////////////////////////////////////////////////////////////
  protected function _make_view_directory($name)
  {
    $entity = strtolower($name);
    
    $path = APPPATH . "views/{$entity}";
    mkdir($path);
    echo "diretorio {$path} criado com sucesso." . PHP_EOL;
    
  }
  
  protected function _make_view_files($name)
  {
    $entity = strtolower($name);
    $data['entity'] = $entity;
    $data['tag'] = '<?php';
    $data['untag'] = '?>';
    //INDEX
    $path_index = APPPATH . "views/{$entity}/index.php";
    $my_index_view = fopen($path_index, 'w') OR die('Impossível criar view index!');
    $index_view_template = $this->parser->parse('templates/my_index_view', $data, TRUE);
    fwrite($my_index_view, $index_view_template);
    fclose($my_index_view);
    echo "view {$path_index} criada com sucesso." . PHP_EOL;
    //CREATE
    $path_create = APPPATH . "views/{$entity}/create.php";
    $my_create_view = fopen($path_create, 'w') OR die('Impossível criar view create!');
    $create_view_template = $this->parser->parse('templates/my_create_view', $data, TRUE);
    fwrite($my_create_view, $create_view_template);
    fclose($my_create_view);
    echo "view {$path_create} criada com sucesso." . PHP_EOL;
    //DETALHES
    $path_details = APPPATH . "views/{$entity}/details.php";
    $my_details_view = fopen($path_details, 'w') OR die('Impossível criar view details!');
    $details_view_template = $this->parser->parse('templates/my_details_view', $data, TRUE);
    fwrite($my_details_view, $details_view_template);
    fclose($my_details_view);
    echo "view {$path_details} criada com sucesso." . PHP_EOL;
  }
  
  protected function _make_controller_file($name)
  {
    $controller_name = strtolower($name);
    $controller_name_capitalized = ucfirst($controller_name);
    $path = APPPATH . "controllers/{$controller_name_capitalized}.php";
    $my_controller = fopen($path, 'w') OR die('Impossível criar arquivo de controller!');
    $data['tag'] = '<?php';
    $data['untag'] = '?>';
    $data['entity'] = $controller_name;
    $data['name'] = $controller_name_capitalized;
    $controller_template = $this->parser->parse('templates/my_controller', $data, TRUE);
    fwrite($my_controller, $controller_template);
    fclose($my_controller);
    echo "controller {$path} criada com sucesso." . PHP_EOL;
  }
  
  protected function _make_model_file($name)
  {
    $model_name = strtolower($name);
    $model_name_capitalized = ucfirst($model_name.'_model');
    $path = APPPATH . "models/{$model_name_capitalized}.php";
    $my_model = fopen($path, 'w') OR die('Impossível criar arquivo de model!');
    $data['tag'] = '<?php';
    $data['untag'] = '?>';
    $data['entity'] = $model_name;
    $data['name'] = $model_name_capitalized;
    $model_template = $this->parser->parse('templates/my_model', $data, TRUE);
    fwrite($my_model, $model_template);
    fclose($my_model);
    echo "model {$path} criada com sucesso." . PHP_EOL;
  }
  
  protected function _make_migration_file($name)
  {
    $date = new DateTime();
    $timestamp = $date->format('YmdHis');
    $entity = strtolower($name);
    $path = APPPATH . "migrations/{$timestamp}" . '_' . "{$name}.php";
    $my_migration = fopen($path, 'w') OR die('Impossível criar arquivo de migration!');
    $data['tag'] = '<?php';
    $data['untag'] = '?>';
    $data['entity'] = $entity;
    $data['name'] = $name;
    $migration_template = $this->parser->parse('templates/my_migration', $data, TRUE);
    fwrite($my_migration, $migration_template);
    fclose($my_migration);
    echo "migration {$path} criada com sucesso." . PHP_EOL;
  }
  
  public function teste($id) 
  {
    $this->load->model('divulgacao/fluxo_model');
    $retorno = $this->fluxo_model->registrar_trabalho($id);
    var_dump($retorno);
  }
}
