<?php

/**
 * Controller class 
 * 
 */
class Controller {

    function __construct($modelName = 'Model') {

        $this->viewLoader = new View();
        $this->model = new $modelName();
    }

}
