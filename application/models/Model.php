

<?php

/*
 * 	Model for collections
 *   
 * 	Joren Sorilla
 * 	2014-05-08
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
        $q = $this->db->get('markers');

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

    public function remove_marker($lat, $lng, $deleted) {
        if ($deleted == 'true')
            $this->db->query("UPDATE markers SET deleted='yes' WHERE lat=? AND lng=?", array(filter_var($lat, FILTER_VALIDATE_FLOAT), filter_var($lng, FILTER_VALIDATE_FLOAT)));
        return;
    }

    public function add_marker($data) {
        $this->db->insert('markers', $data);
    }

}