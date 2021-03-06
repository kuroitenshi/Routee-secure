

<?php
include('application/models/LogManager.php');
/*
 * 	Model for collections
 *   
 */

class Model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->dbutil();
    }

    /**
     * 	retrieves list of banks
     * 	@return array containing results
     */
    public function get_markers() {
        $this->db->select('*');
        $q = $this->db->query('SELECT * FROM markers, users WHERE markers.report_id = users.user_id');

        if ($q->num_rows() > 0) {

            $config = array(
                'root' => 'root',
                'element' => 'element',
                'newline' => "\n",
                'tab' => "\t"
            );


            return $this->dbutil->xml_from_result($q, $config);
        }
    }

    function login($username, $password) {
        $this->db->limit(1);
        $query = $this->db->query('SELECT user_id, username, password 
                          FROM users u
                          INNER JOIN account_details ad ON (u.user_id = ad.password_id)
                          WHERE u.username = ?;', array($username));


        if ($query->num_rows() == 1 && $query->result_array()[0]['password'] == hash('sha256', $password, false)) {
            $this->loginLog($username, "Login SUCCESS");
            return $query->result();
        } else {
            loginlog($username, "Login FAILED");
            return false;
        }
    }

    function register($username, $password, $email) {

        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return false;
        } else {
            $data['username'] = $username;

            $this->db->insert('users', $data);
            $data['user_id'] = $this->db->insert_id();
            $data_pass['password'] = hash('sha256', $password, false);
            $data_pass['email'] = $email;
            $data_pass['password_id'] = $data['user_id'];
            $this->db->insert('account_details', $data_pass);
            
            $this->loginLog($username, "REGISTER");
            
            return $data;
        }
    }

    public function remove_marker($lat, $lng, $deleted) {
        if ($deleted == 'true')
            $this->db->query("UPDATE markers SET deleted='yes' WHERE lat=? AND lng=?", array(filter_var($lat, FILTER_VALIDATE_FLOAT), filter_var($lng, FILTER_VALIDATE_FLOAT)));
        return;
    }

    public function log_activity($data){
        $data = array(
                'user_id' => $user_id,
                'action_log' => $action_log,
                'date' => date('Y-m-d H:i:s')
            );
        $this->db->insert('activity', $data);
        
    }
    
    public function loginLog($user, $success){
        $logman = new LogManager();
        
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id');
        $ip = $this->session->userdata('ip_address');
        
        $logman->writeLoginToLog($user, $session_id, $ip, $success);
    }
    
    public function activityLog($activity){
         $logman = new LogManager();
        
        
        $this->load->library('session');
        $user =  $this->session->userdata('logged_in')['username'];
        $session_id = $this->session->userdata('session_id');
        $ip = $this->session->userdata('ip_address');
        
        $logman->writeActivityLog($user, $session_id, $ip, $activity);
    }

    public function add_marker($data) {
        $this->activityLog("REPORT");
        $this->db->insert('markers', $data);
    }

}