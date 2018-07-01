<?php

/**
 * main page model
 *
 * */
class Student_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getStudentData() {
        $sud = $this->db->fetchAllAssoc('SELECT `id`,`first_name`,`last_name` FROM `student`');
        return $sud;
    }

    public function getSubjectData() {
        $subs = $this->db->fetchAllAssoc('SELECT `id`,`subject` FROM `subject`');
        return $subs;
    }

    public function getStudentSubjectData() {
        $studsubs = $this->db->fetchAllAssoc('SELECT
    `student_subject`.`student_id`
    , `subject`.`subject`
FROM
    `student_subject`
    INNER JOIN `subject` 
        ON (`student_subject`.`subject_id` = `subject`.`id`);');

        return $studsubs;
    }

    public function insertStudentRow($firstname, $lastname) {

        $sth = $this->db->onlyExecute('INSERT INTO `student`
			(`first_name`,`last_name`) 
			VALUES (:first_name, :last_name)
			', array(':first_name' => $firstname, ':last_name' => $lastname));
        if ($sth) {
            echo true;
        } else {
            echo false;
        }
    }

    public function insertStudentSubjects($subjects) {

        $last_id = $this->db->getLastInsertId();

        foreach ($subjects as $ids) {

            $subs = $this->db->onlyExecute('INSERT INTO student_subject 
			(`student_id`,`subject_id`) 
			VALUES (:student_id, :subject_id)
			', array(':student_id' => $last_id, ':subject_id' => $ids));
            if ($subs) {
                echo true;
            } else {
                echo false;
            }
        }
    }

}
