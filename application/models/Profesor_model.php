<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor_model extends CI_Model {

	private $cedula;
	private $nombre;
	private $fecha;
	private $lugar_nacimiento;
    private $titulo;
    private $departamento;



	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->cedula = isset($value->cedula)? $value->cedula : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->fecha = isset($value->fecha)? $value->fecha : null;
                $this->lugar_nacimiento= isset($value->lugar_nacimiento)? $value->lugar_nacimiento : null;
                $this->titulo = isset($value->titulo)? $value->titulo : null;
				$this->departamento = isset($value->departamento)? $value->departamento : null;

			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'cedula':
			case 'nombre':
			case 'fecha':
			case 'lugar_nacimiento':
            case 'titulo':
			case 'departamento':

				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

    public function obtener_todas() {
		$query = $this->db->get('profesor');

		$result = [];

		foreach ($query->result() as $key=>$profesor) {
			$result[$key] = new Profesor_model($profesor);
		}
		return $result;
	}

		public function obtener_profesor($cedula) {

        $query = $this->db->get_where('profesor', array('cedula' => $cedula));
        return $query->row_array();
	}

		public function actualizar() {
		$data = [
			'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'fecha' => $this->fecha,
			'lugar_nacimiento' => $this->lugar_nacimiento,
			'titulo' => $this->titulo,
			'departamento' => $this->departamento
		];

		return $this->db->update('profesor', $data, array('cedula' => $this->cedula));
	}



	
}
