<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

  function __construct(){
    parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  }

  function index(){
  $this->load->view('menu');
  }

   function listar_profesores(){

     $this->load->model('Profesor_model');
     $resultado = $this->Profesor_model->obtener_todas();

     $cantidad_profesores = count($resultado);
     for ($i=0; $i <  $cantidad_profesores; $i++) { 
       	$indice = "profesor".($i+1);
      	$result[$indice] =  $resultado[$i];
     }

    $result['cantidad'] = $cantidad_profesores;
     $this->load->view('listar_profesores',$result);


  }


}
