<?php
return [
    'criarBanda' => [
        'type' => 2,
        'description' => 'Cria uma banda',
    ],
    'editarBanda' => [
        'type' => 2,
        'description' => 'Editar banda',
    ],
    'eliminarBanda' => [
        'type' => 2,
        'description' => 'Elimina uma banda',
    ],
    'criarGenero' => [
        'type' => 2,
        'description' => 'Cria genero',
    ],
    'editarGenero' => [
        'type' => 2,
        'description' => 'Edita genero',
    ],
    'eliminarGenero' => [
        'type' => 2,
        'description' => 'Elimina genero',
    ],
    'criarHabilidade' => [
        'type' => 2,
        'description' => 'Cria habilidade',
    ],
    'editarHabilidade' => [
        'type' => 2,
        'description' => 'Edita habilidade',
    ],
    'eliminarHabilidade' => [
        'type' => 2,
        'description' => 'Elimina habilidade',
    ],
    'criarMusico' => [
        'type' => 2,
        'description' => 'Cria musico',
    ],
    'editarMusico' => [
        'type' => 2,
        'description' => 'Edita musico',
    ],
    'eliminarMusico' => [
        'type' => 2,
        'description' => 'Elimina musico',
    ],
    'criarProfile' => [
        'type' => 2,
        'description' => 'Cria profile',
    ],
    'editarProfile' => [
        'type' => 2,
        'description' => 'Edita profile',
    ],
    'eliminarProfile' => [
        'type' => 2,
        'description' => 'Elimina profile',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'criarBanda',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'editarBanda',
            'criarBanda',
        ],
    ],
];
