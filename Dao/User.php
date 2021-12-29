<?php

namespace Dao;

class User extends Dao {

    function validateUserInfo(string $username, string $password, bool $isMd5 = false) {
        if($isMd5) {
            $md5 = $password;
        } else {
            $md5 = md5($password);
        }
        $query = "SELECT `username`, `password`
            FROM `users`
            WHERE username='$username' AND password='$md5'";
        $connection = $this->getConnection();
        $result = $connection->selectOne($query);
        if($result===false) {
            return false;
        }
        return true;
    }

}