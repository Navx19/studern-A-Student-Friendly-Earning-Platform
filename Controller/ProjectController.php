<?php

class ProjectController {

    public function index() {
        //$isLoggedIn = true;

        //db connection eikhane
        $projects = [
            ['id' => 1, 'title' => 'Website for Start-up', 'desc' => 'Frontend & UI work'],
            ['id' => 2, 'title' => 'React Portfolio', 'desc' => 'React + RN project']
        ];

        require "../../Views/Dashboard/index.php";
    }
}