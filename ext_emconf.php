<?php


$EM_CONF[$_EXTKEY] = [
    'title' => 'Add Frontend user to Newsletter or remove him/her',
    'description' => 'Show Text with Checkbox. After user Accepts, add user to Newsletter',
    'category' => 'plugin',
    'author' => 'Joerg Velletti',
    'author_email' => 'typo3@velletti.de',
    'state' => 'beta',
    'version' => '11.5.2',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.45.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
