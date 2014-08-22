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
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('security');
    }

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['login_status'] = TRUE;
            $this->load->view('routee_head');
            $this->load->view('routee', $data);
        } else {
            $data['login_status'] = FALSE;
            $this->load->view('home_head');
            $this->load->view('home_login', $data);
        }
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userField', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('passField', 'Password', 'trim|required|xss_clean|callback_check_database');

        $this->form_validation->run();
        $this->index();
    }

    public function logout() {
        $this->load->library('session');
        $user =  $this->session->userdata('logged_in')['username'];
        $this->model->loginLog($user, "LOGOUT");
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/');
    }

    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userRegisterField', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('passRegisterField', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('emailRegisterField', 'Email', 'trim|required|valid_email|callback_check_registration|xss_clean');

        $this->form_validation->run();
        $this->index();
    }



    public function check_database($password) {

        $username = $this->input->post('userField');
        $result = $this->model->login($username, $password);
        

        if ($result != FALSE) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->user_id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in' , $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function captcha_check() {
        require_once('./application/helpers/recaptchalib.php');
        $privatekey = "6Lca-fgSAAAAAMVeHdOc-SKGq2x1KHPCv0FsoTOc";
        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid) {             
            echo "<script>alert('Please enter the characters in the image correctly.'); var resp = 0;</script>";
            $this->index();
        } else {
           echo "<script>var resp = 1;</script>";
            $this->index();
        }
    }

    public function check_registration($email) {

        $username = $this->input->post('userRegisterField');
        $password = $this->input->post('passRegisterField');
        $result = $this->model->register($username, $password, $email);

        if ($result) {
            $sess_array = array(
                'id' => $result['user_id'],
                'username' => $result['username']
            );
            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_registration', 'User already exists!');
            return FALSE;
        }
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
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'destinationField',
                'label' => 'Destination',
                'rules' => 'trim|required|xss_clean'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            echo '<script>alert("'.strip_tags(validation_errors()).'"); </script>';

        } else{
            $this->load->view("routee_head");
            $this->Model->activityLog("SEARCH ROUTE");
            echo '<script type="text/javascript">routeAddress();</script>';
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

    public function validate_desc(){
        
        $mdesc = $this->input->post('desc', true);
        $mdesc = htmlspecialchars($mdesc);
        $mdesc = trim($mdesc);
        
        if($mdesc == '')
        {   
            $this->output->set_status_header('400'); //Triggers the jQuery error callback
            $message['message'] = "Event description is empty.";
            echo json_encode($message);
        }

    }

    public function validate_route_fields(){
        
        $source = $this->input->post('source', true);
        $destination = $this->input->post('destination', true);
        $source = htmlspecialchars($source);
        $source = trim($source);
        $destination = htmlspecialchars($destination);
        $destination = trim($destination);


        if($destination == '' || $source == '')
        {   
            $this->output->set_status_header('400'); //Triggers the jQuery error callback
            $message['message'] = "Some fields are empty";
            echo json_encode($message);
        }

    }
    

    public function debug_to_console($data) {

        if (is_array($data))
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }

}

