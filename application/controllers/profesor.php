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


  function registrar($opcion = NULL){

    $this->load->model('Profesor_model');

      if($opcion == "formulario"){

        $this->load->view('registrar');

      }elseif ($opcion == "validar") {

        $this->form_validation->set_rules('cedula', 'cedula', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('lugar_nacimiento', 'lugar_nacimiento', 'required');
        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('departamento', 'departamento', 'required');
       
       if ($this->form_validation->run() == FALSE){

            $this->load->view('registrar_granjero');

        }else{

          $value['cedula'] = $this->input->post('cedula');
          $value['nombre'] = $this->input->post('nombre');
          $value['fecha'] = $this->input->post('fecha');
          $value['lugar_nacimiento'] = $this->input->post('lugar_nacimiento');
          $value['titulo'] = $this->input->post('titulo');
          $value['departamento'] = $this->input->post('departamento');

          $profesor = new Profesor_model($value);
          $resultado = $profesor->registrar();

          if($resultado == TRUE){
            echo "profesor insertado";
          }else{
            echo "Fallo al insertar profesor";
          }

      }
        
      }
    }

}
