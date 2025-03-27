<?php
// This file is generated. Do not modify it manually.
return array(
	'animation-to-scroll' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'school-blocks/animation-to-scroll',
		'version' => '0.1.0',
		'title' => 'Animation To Scroll',
		'category' => 'design',
		'icon' => 'star-half',
		'description' => 'Animation for scolling.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'animation' => array(
				'type' => 'string',
				'default' => 'fadeIn'
			)
		),
		'textdomain' => 'animation-to-scroll',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'copyright-date' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'school-blocks/copyright-date',
		'version' => '0.1.0',
		'title' => 'Copyright Date',
		'category' => 'text',
		'icon' => 'calendar',
		'description' => 'Displays a copyright date.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'copyright-date',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'staff-department' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'school-blocks/staff-department',
		'version' => '0.1.0',
		'title' => 'Staff Department',
		'category' => 'text',
		'icon' => 'building',
		'description' => 'Display the department of staff.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'staff-department',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	)
);
