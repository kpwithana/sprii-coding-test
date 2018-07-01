<?php

/**
 * Main page controller 
 * 
 *
 */
class IndexController extends Controller {

    function __construct() {

        parent::__construct('Student_Model');
    }

    function index() {

        $this->viewLoader->StudentData = $this->model->getStudentData();
        $this->viewLoader->SubjectData = $this->model->getSubjectData();
        $this->viewLoader->StudentSubjectData = $this->model->getStudentSubjectData();
        $this->viewLoader->render('Student');
    }

    function insertData() {
      
        $firstname = isset($_POST['firstname']) ? filter_var($_POST['firstname']) : '';
	$lastname = isset($_POST['lastname']) ? filter_var($_POST['lastname']) : '';
        $subjects = array();
        $subjects = isset($_POST['subjects']) ? $_POST['subjects'] : '';

        if (!empty($firstname) & !empty($lastname)) {
        $this->model->insertStudentRow($firstname, $lastname);
        }
        else {
            echo false;
        }
      
        if (!empty($subjects)) {
         $this->model->insertStudentSubjects($subjects);
        }
        else {
            echo false;
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        exit();
    }

}
