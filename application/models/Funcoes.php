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
}