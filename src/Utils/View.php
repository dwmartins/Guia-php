<?php

namespace App\Utils;

class View {
    /**
     * Renders a view.
     *
     * @param string $view Full name of the view, ex: publicView/contact.php
     * @param array $data Data to be passed to the view
     */

    public static function render(string $view, array $data = []) {
        // Extract the data as local variables
        extract($data);

        // View file path
        $viewPath = ROOT_VIEWS . "$view";

        if(!file_exists($viewPath)) {
            throw new \Exception("View '$view' not found!");
        }

        require ROOT_VIEWS . "master.php";
        exit();
    }
}