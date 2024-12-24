<?php

class Controller {
    public function view($view, $data = []) {
        require_once "../app/views/{$view}.php";
    }

    public function model($model) {
        require_once "../app/models/{$model}.php";
        return new $model;
    }

    public function render($view, $data = [], $title = '') {
        // Tentukan file path untuk tampilan
        $viewPath = "../app/views/{$view}.php";
    
        if (file_exists($viewPath)) {
            // Memasukkan data yang ingin diteruskan ke tampilan
            extract($data);
            
            // Set title jika ada
            if ($title) {
                echo "<title>{$title}</title>";
            }
    
            // Memasukkan tampilan
            require_once $viewPath;
        } else {
            echo "View file not found.";
        }
    }
    
    
}
