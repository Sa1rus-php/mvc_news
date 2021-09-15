<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
    'postinfo' => [
        'controller' => 'main',
        'action' => 'postinfo',
    ],
	'main/postinfo/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'postinfo',
	],
	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
    'admin/editusers/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'editusers',
    ],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
    'admin/deleteusers/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deleteusers',
    ],
	'admin/posts/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/posts' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
    'admin/admins' => [
        'controller' => 'admin',
        'action' => 'admins',
    ],
];