<?php

defined('NDA') || exit;

function get_basic_colors()
{
	$items = [
		'violet' =>
			[
				'nm' => [ 'low' => 380, 'high' => 449 ],
				'hue' => [ 'low' => 260, 'high' => 338 ],
				'sat' => [ 'low' => 0, 'high' => 0 ],
				'lit' => [ 'low' => 34, 'high' => 50 ],
			],
		'blue' =>
			[
				'nm' =>  [ 'low' => 450, 'high' => 494 ],
				'hue' => [ 'low' => 189, 'high' => 218 ],
				'sat' => [ 'low' => 100, 'high' => 100 ],
				'lit' => [ 'low' => 18, 'high' => 50 ],
			],
		'green' =>
			[
				'nm' => [ 'low' => 495, 'high' => 569 ],
				'hue' => [ 'low' => 78, 'high' => 98 ],
				'sat' => [ 'low' => 100, 'high' => 100 ],
				'lit' => [ 'low' => 26, 'high' => 50 ],
			],
		'yellow' =>
			[
				'nm' => [ 'low' => 570, 'high' => 589 ],
				'hue' => [ 'low' => 49, 'high' => 51 ],
				'sat' => [ 'low' => 100, 'high' => 100 ],
				'lit' => [ 'low' => 42, 'high' => 50 ],
			],
		'orange' =>
			[
				'nm' => [ 'low' => 590, 'high' => 619 ],
				'hue' => [ 'low' => 22, 'high' => 23 ],
				'sat' => [ 'low' => 100, 'high' => 100 ],
				'lit' => [ 'low' => 50, 'high' => 50 ],
			],
		'red' =>
			[
				'nm' => [ 'low' => 620, 'high' => 749 ],
				'hue' => [ 'low' => 0, 'high' => 0 ],
				'sat' => [ 'low' => 100, 'high' => 100 ],
				'lit' => [ 'low' => 18, 'high' => 50 ],
			],
	];
	return $items;
}
