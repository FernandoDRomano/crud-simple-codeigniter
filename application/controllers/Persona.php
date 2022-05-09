<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Persona extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("personaModel");
        $this->load->helper(array("form", "url"));
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data["personas"] = $this->personaModel->all();
        $this->load->view("personas/index", $data);
    }

    public function create(){
        $this->load->view("personas/create");
    }

    public function store(){
        //$this->form_validation->set_rules('nombre', 'Nombre', 'required', array('required' => 'El campo %s es requerido') );
        //$this->form_validation->set_rules('apellido', 'Apellido', 'required', array('required' => 'El campo %s es requerido') );
        //$this->form_validation->set_rules('edad', 'Edad', 'required', array('required' => 'El campo %s es requerido') );

        $config = array(
            array(
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'trim|required|min_length[2]|max_length[100]',
                    'errors' => array(
                        'required' => 'El campo {field} es requerido.',
                        'min_length' => 'El campo {field} debe tener mas de {param} caracteres.',
                        'max_length' => 'El campo {field} debe tener menos de {param} caracteres.',
                    ),
            ),
            array(
                    'field' => 'apellido',
                    'label' => 'Apellido',
                    'rules' => 'trim|required|min_length[2]|max_length[100]',
                    'errors' => array(
                        'required' => 'El campo {field} es requerido.',
                        'min_length' => 'El campo {field} debe tener mas de {param} caracteres.',
                        'max_length' => 'El campo {field} debe tener menos de {param} caracteres.',
                    ),
            ),
            array(
                    'field' => 'edad',
                    'label' => 'Edad',
                    'rules' => 'trim|required',
                    'errors' => array(
                        'required' => 'El campo {field} es requerido.',

                    ),
            )
        );

        $this->form_validation->set_rules($config);

        $data["nombre"] = $this->input->post("nombre");
        $data["apellido"] = $this->input->post("apellido");
        $data["edad"] = $this->input->post("edad");

        if ($this->form_validation->run() === false){
            $this->load->view("personas/create", $data);
        }else{
            $result = $this->personaModel->insert($data);
            if($result){
                redirect("persona/index");
            }
        }
        
    }

    public function edit($id){

        $persona = $this->personaModel->find($id);

        if(isset($persona)){

            $data["id"] = $persona->persona_id;
            $data["nombre"] = $persona->nombre;
            $data["apellido"] = $persona->apellido;
            $data["edad"] = $persona->edad;
    
            $this->load->view("personas/edit", $data);
        }else{
            $data["heading"] = "Error 404";
            $data["message"] = "No se encontraron registros";
            $this->load->view("errors/html/error_404", $data);
        }

    }

    public function update($id){
        $data["nombre"] = $this->input->post("nombre");
        $data["apellido"] = $this->input->post("apellido");
        $data["edad"] = $this->input->post("edad");

        $this->personaModel->update($id, $data);

        redirect("persona/index");
    }

    public function destroy($id){
        if(isset($id)){
            $this->personaModel->delete($id);
            redirect("persona/index");
        }else{
            show_404();
        }
    }
    
}
        
    /* End of file  Persona.php */
        
                            