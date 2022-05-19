<?php
return [
	[
		'name' => 'Trang tĩnh',
		'icon' => 'fa-home',
		'route' => 'backend.dashboard.index',
		'items' => [
			[
				'name' => 'Giới thiệu',
				'route' => 'backend.about.edit'
			],
			[
				'name' => 'Liên hệ',
				'route' => 'backend.contact.edit'
			]
		]
		
	]
];