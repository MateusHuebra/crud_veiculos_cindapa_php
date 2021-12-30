<?php

namespace Services;

class SessionMessages {

    static function set(string $key, $data) {
        $_SESSION['messages'][$key] = $data;
    }

    static function get($key) {
        if(isset($_SESSION['messages'][$key])) {
            return $_SESSION['messages'][$key];
        }
        return false;
    }

    static function getAll() {
        return $_SESSION['messages'];
    }

    static function unset() {
        unset($_SESSION['messages']);
    }

}