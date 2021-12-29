<?php

namespace Services;

class SessionMessages {

    static function set(array $data) {
        $_SESSION['messages'] = $data;
    }

    static function get($key) {
        return $_SESSION['messages'][$key];
    }

    static function getAll() {
        return $_SESSION['messages'];
    }

    static function unset() {
        unset($_SESSION['messages']);
    }

}