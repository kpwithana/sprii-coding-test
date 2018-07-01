<?php

/**
 * Generic model make db connection 
 *
 */
class Model {

    function __construct() {

        $this->db = new Database();
    }

}
