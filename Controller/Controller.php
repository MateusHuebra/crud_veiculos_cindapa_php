<?php

namespace Controller;

abstract class Controller {

    protected function view(string $viewRoute, array $data = []) {
        extract($data);
        require('View/'.$viewRoute.'.php');
    }

    protected function redirect(string $url, array $params = []) {
        $location = 'Location: /'.$url;
        if(!empty($params)) {
            $paramsArray = [];
            foreach ($params as $key => $value) {
                $paramsArray[] = $key.'='.$value;
            }
            $location.='?'.implode('&', $paramsArray);
        }
        header($location);
        die();
    }

}