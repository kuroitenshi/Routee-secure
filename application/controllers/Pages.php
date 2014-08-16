<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {

        parent::__construct();
        $this->load->model('model');
    }

    public function index() {
        $this->view_home();
    }

    public function view_home() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('home');
    }

    public function submit_route() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'sourceField',
                'label' => 'Source',
                'rules' => 'required'
            ),
            array(
                'field' => 'destinationField',
                'label' => 'Destination',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->view_home();
        } else {

            $source = $this->input->post('sourceField');            
            $destination = $this->input->post('destinationField');
            if (!empty($source) && !empty($destination)) {
                $data['source'] = $source;
                $data['destination'] = $destination;
            } else {
                $data['source'] = '';
                $data['destination'] = '';
            }

            $data['type'] = '';
            $data['place'] = '';
            $data['Description'] = '';

            $this->load->view('routee_head', $data);
            $this->load->view('routee', $data);
        }
    }

    public function submit_report() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'pType',
                'label' => 'Event type',
                'rules' => 'required'
            ),
            array(
                'field' => 'placeName',
                'label' => 'Name of place',
                'rules' => 'required'
            ),
            array(
                'field' => 'pDesc',
                'label' => 'Description',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->view_home();
        } else {

            $pType = $this->input->post('pType');
            $placeName = $this->input->post('placeName');
            $pDesc = $this->input->post('pDesc');
            if (!empty($pType) && !empty($placeName) && !empty($pDesc)) {

                $data['type'] = $this->input->post('pType');
                $data['place'] = $this->input->post('placeName');
                $data['Description'] = $this->input->post('pDesc');
            } else {

                $data['type'] = '';
                $data['place'] = '';
                $data['Description'] = '';
            }


            $data['source'] = '';
            $data['destination'] = '';


            $this->load->view('routee_head', $data);
            $this->load->view('routee', $data);
        }
    }

    public function save_marker() {

        $data = $this->input->post();
        $this->debug_to_console($data);
        if ($data) {
            $this->model->add_marker($data);
            $output = '<h3 class="marker-heading">' . $data['type'] . '</h3><h6>' . $data['date'] . '</h6><p>' . $data['Address'] . '</p><hr><p>' . $data['description'] . '</p>';
            echo $output;
        }
    }

    public function remove_marker() {
        $data = $this->input->post();
        $this->debug_to_console($data);
        if ($data) {
            $this->model->remove_marker($data['lat'], $data['lng'], $data['deleted']);
            return;
        }
    }

    public function get_markers() {
        header("Content-type: text/xml");
        echo $this->model->get_markers();
    }

    public function debug_to_console($data) {

        if (is_array($data))
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }

}

