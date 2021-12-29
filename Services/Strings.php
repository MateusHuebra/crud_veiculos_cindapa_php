<?php

namespace Services;

class Strings {

    const STRINGS = [
        'sport' => 'esporte',
        'classic' => 'clássico',
        'economic' => 'econômico',
        'turbo' => 'turbo',
        'city' => 'para cidades',
        'distant_travels' => 'para longas distâncias'
    ];

    static function get(string $stringKey) {
        return self::STRINGS[$stringKey];
    }

}