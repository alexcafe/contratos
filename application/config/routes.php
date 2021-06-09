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
