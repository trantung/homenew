<?php

return array(

    'multi' => array(
        'admin' => array(
            'driver' => 'eloquent',
            'model' => 'Admin'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        ),
        'card' => array(
            'driver' => 'eloquent',
            'model' => 'Card'
        ),
        'member' => array(
            'driver' => 'eloquent',
            'model' => 'CardAdmin'
        ),
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);
