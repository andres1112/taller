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

public function modificar($id = null, $modificacion = null){
	 $this->load->model('Profesor_model');

	if($id != null) {

	 $this->load->model('Profesor_model');
	 $profesor = $this->Profesor_model->obtener_profesor($id);

	 $data["profesor"] = $profesor;

	 if($modificacion == NULL){
	 	$this->load->view('modificar_profesor',$data);
	 }else{
		 
        $this->form_validation->set_rules('cedula', 'cedula', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('lugar_nacimiento', 'lugar_nacimiento', 'required');
        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('departamento', 'departamento', 'required');		
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('modificar_profesor',$data);
		}
		else
		{
          $value['cedula'] = $this->input->post('cedula');
          $value['nombre'] = $this->input->post('nombre');
          $value['fecha'] = $this->input->post('fecha');
          $value['lugar_nacimiento'] = $this->input->post('lugar_nacimiento');
          $value['titulo'] = $this->input->post('titulo');
          $value['departamento'] = $this->input->post('departamento');

			//$this->Curso->construc($value);
			$profe = new Profesor_model ($value);
			if ($profe->actualizar()){
				$data["profesor"] = $value;
				$this->load->view('modificar_profesor',$data);
				echo "Modificado exitosamente";
			}
		}
	 }

 	}
	else {
		redirect('/profesor/listar_profesores');
	 }


 }




}
