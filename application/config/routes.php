<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['alterar_senha'] = 'auth/change_password';
$route['recuperar_senha'] = 'auth/forgot_password';

$route['principal'] = 'dashboard/index';

$route['pessoas'] = 'pessoa/index'; //Controller/Função
$route['pessoas/novo'] = 'pessoa/create_pessoa';
$route['pessoas/excluir/(:num)'] = 'pessoa/delete_pessoa/$1';
$route['pessoas/visualizar/(:num)'] = 'pessoa/visualizar_pessoa/$1';
$route['pessoas/editar/(:num)'] = 'pessoa/editar_pessoa/$1';

$route['contratos'] = 'contrato/index'; 
$route['contratos/novo'] = 'contrato/create_contrato';
$route['contratos/excluir/(:num)'] = 'contrato/delete_contrato/$1';
$route['contratos/editar/(:num)'] = 'contrato/editar_contrato/$1';
$route['contratos/visualizar/(:num)'] = 'contrato/visualizar_contrato/$1';
$route['contratos/editar/(:num)/upload_anexo'] = 'anexo/create';
$route['contratos/editar/(:num)/delete_anexo/(:num)'] = 'anexo/delete/$1';

$route['pagamentos'] = 'pagamento/index'; 
$route['pagamentos/visualizar/(:num)'] = 'pagamento/details/$1';
$route['pagamentos/novo/(:num)'] = 'pagamento/create/$1';
$route['pagamentos/excluir/(:num)'] = 'pagamento/delete/$1';
