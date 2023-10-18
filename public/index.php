<?php

session_start();

class App 
{
    private function splitURL() 
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode('/', $URL);
        return $URL;
    }
    
    private function loadController()
    {
        $URL = splitURL();
    
        $fileName = '../app/controllers/' . ucfirst($URL[0]) . '.php';
    
        if (file_exists($fileName)) {
            require $fileName;
        } else {
            $fileName = '../app/controllers/_404.php';
            require $fileName;
        }
    }
}

function show($stuff) 
{
    echo "<pre>";
    print_r($stuff);
    echo "<pre>";
}

loadController();