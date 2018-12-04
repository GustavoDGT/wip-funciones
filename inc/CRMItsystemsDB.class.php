<?php
define('CRM_HOST', '190.117.126.164');
define('CRM_USER', 'crm_zapier');
define('CRM_PASS', '$apier%u');
define('CRM_NAME', 'postgres');

class CRMItsystemsDB
{
    private $db;

    public function __construct() {
        // Connect To Database
        try {
            $this->db = new wpdb(CRM_USER, CRM_PASS, CRM_NAME, CRM_HOST);
            $this->db->show_errors(); // Debug
        } catch (Exception $e) {    // Database Error
            echo $e->getMessage();
        }
    }

    // Example Query -- Count Students
    public function count_users() {
        return $this->db->get_var("SELECT COUNT(*) FROM `crm.interesado`;");
    }

    // Example Query #2 -- Update Student Name
    public function update_student_id($student_id, $student_name) {
        return $this->db->update(
            'students',
            array('student_name' => $student_name),
            array('student_id' => $student_id),
            array('%s'), array('%d')
        );
    }
}
?>