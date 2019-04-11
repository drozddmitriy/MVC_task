<?php

return [
    '' => [
        'controller' => 'site',
        'action' => 'index',
    ],
    'add' => [
        'controller' => 'site',
        'action' => 'add',
    ],
    'update/{id:\d+}' => [
        'controller' => 'site',
        'action' => 'update',
    ],
    'delete/{id:\d+}' => [
        'controller' => 'site',
        'action' => 'delete',
    ],
    'addtask' => [
        'controller' => 'task',
        'action' => 'addtask',
    ],
    'deltask/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'deltask',
    ],
    'uptask/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'uptask',
    ],
    'setstatus/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'setstatus',
    ],
    'setdate/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'setdate',
    ],

    ////////////////////////////////
    'login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

];