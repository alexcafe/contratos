<?php
class Funcoes extends CI_Model {

  public function __construct()
  {
    // $this->load->database();
    // $this->load->library('ion_auth');
    //$this->load->helper('url');
  }

  function limpa_numero($str) {
    return preg_replace("/[^0-9]/", "", $str);
  }

  function mascara_cel($str)
{
	$mascarado = substr_replace($str, '(', 0, 0);
	$mascarado = substr_replace($mascarado, ')', 3, 0);
	$mascarado = substr_replace($mascarado, ' ', 4, 0);
	$mascarado = substr_replace($mascarado, '-', 10, 0);
	return $mascarado;
}

function mascara_tel($str)
{
	$mascarado = substr_replace($str, '(', 0, 0);
	$mascarado = substr_replace($mascarado, ')', 3, 0);
	$mascarado = substr_replace($mascarado, ' ', 4, 0);
	$mascarado = substr_replace($mascarado, '-', 9, 0);
	return $mascarado;
}

function mascara_cep($str)
{
	$mascarado = substr_replace($str, '-', 5, 0);
	return $mascarado;
}

function mascara_cpf_cnpj($str)
{
	if(mb_strlen($str) == 11)
	{
		$mascarado = substr_replace($str, '.', 3, 0);
		$mascarado = substr_replace($mascarado, '.', 7, 0);
		$mascarado = substr_replace($mascarado, '-', 11, 0);
		return $mascarado;
	}
	else
	{
		$mascarado = substr_replace($str, '.', 2, 0);
		$mascarado = substr_replace($mascarado, '.', 6, 0);
		$mascarado = substr_replace($mascarado, '/', 10, 0);
		$mascarado = substr_replace($mascarado, '-', 15, 0);
		return $mascarado;
	}
}

function valor_view($str)
{
  $valor = str_replace('.',',', $str);
  return $valor;
}
}
