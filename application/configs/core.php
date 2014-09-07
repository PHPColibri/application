<?php

// @todo: будет переделано
	global $config;

	// Разделы (админка, ЛК пользователя...)
	// Прим.: дефолтный раздел не указывается, он есть по умолчанию
	$config['divisions']=array(
		'admin', // "example.ru/admin"
		// 'user', // "example.ru/user"
	);
	
	// пока не используется
	$config['routes']=array();