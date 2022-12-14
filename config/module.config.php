<?php
namespace Try2catch\WebPush;

use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Try2catch\WebPush\Command;

return [

	'console' => [
		'commands' => [
			Command\Tools\CreateKeys::class,
			Command\Notification\Send::class,
		],
	],

	'doctrine' => [
		'driver' => [
			'webpush_entities' => [
				'class' => AttributeDriver::class,
				'cache' => 'array',
				'paths' => [ __DIR__ . '/../src' ],
			],
			'orm_default'      => [
				'drivers' => [
					'Try2catch\WebPush' => 'webpush_entities',
				],
			],
		],
	],

	'service_manager' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],

	'controllers' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],
];
