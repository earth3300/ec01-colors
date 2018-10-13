<?php

/**
 * Collate Colors
 */
class GenerateHSLColors
{
	protected $opts = [
		'max' => 40,
		'hsl' => [
		'h' => [ 'min' => 0, 'max' => 360 ],
		's' => [ 'min' => 0, 'max' => 100 ],
		'l' => [ 'min' => 0, 'max' => 100 ],
		],
		'inc_h' => 20,
		'inc_s' => 20,
		'inc_l' => 16,
		];

	/**
	 * Get the goods
	 *
	 * 	hsl(0, 0%, 0%);
	 */
	public function get( $args=null )
	{
		$this->load();
		$template = new ColorTemplate();

		if ( $colors = $this->generate() )
		{
			$article = $template->getHTMLfromHSL( $colors );
			$page = $template->getPageHTML( $article );

			return $page;
		}
		else {
			return 'N/A';
		}
	}

	private function load()
	{
		require_once( __DIR__ . '/template.php' );
	}

	private function generate()
	{
		$colors = [];

		$hsl['h'] = 0;
		$hsl['s'] = 0;
		$hsl['l'] = 0;

		$inc_h = $this->opts['inc_h'];
		$inc_s = $this->opts['inc_s'];
		$inc_l = $this->opts['inc_l'];

		/**
		 * For each run through the loop, we need a distinct color.
		 * This means all the values of H, S and L need to be complete,
		 * for a single index value.
		 */
		$i = 0;

		for( $h=0; $h < 360 / $inc_h; $h++ )
		{
			for( $s=1; $s < 100 / $inc_s; $s++ )
			{
				for( $l=1; $l < 96 / $inc_l; $l++ )
				{
					//variable increments
					$colors[$i]['h'] = $h * $inc_h;

					//20% increments
					$colors[$i]['s'] = $s * $inc_s;

					//10% increments
					$colors[$i]['l'] = $l * $inc_l;
					$i++;
				}
			}
		}

		return $colors;
	}

	private function group( $color )
	{
		$name = '';
		if
		(
			$color->h >= 260 && $color->h <= 338
			&& $color->s == 0
			&& $color->l >= 34 && $color->l <= 50
		)
		{
			$name = 'violet';
		}
		else if
		(
			$color->h >= 189 && $color->h <= 218
			&& $color->s == 100
			&& $color->l >= 18 && $color->l <= 50
		)
		{
			$name = 'blue';
		}
		else if
		(
			$color->h >= 78 && $color->h <= 98
			&& $color->s == 100
			&& $color->l >= 34 && $color->l <= 50
		)
		{
			$name = 'green';
		}
		else if
		(
			$color->h >= 49 && $color->h <= 51
			&& $color->s == 100
			&& $color->l >= 42 && $color->l <= 50
		)
		{
			$name = 'yellow';
		}
		else if
		(
			$color->h >= 22 && $color->h <= 23
			&& $color->s == 100
			&& $color->l == 50
		)
		{
			$name = 'orange';
		}
		else if
		(
			$color->h == 0
			&& $color->s == 100
			&& $color->l >= 18 && $color->l <= 50
		)
		{
			$name = 'red';
		}
		return $name;
	}

	/**
	 * Get the HSL value as a Comma Separated String
	 *
	 * @pararm array $hsl
	 *
	 * @return string
	 */
	protected function getHSLValue( $hsl )
	{
		$hsl = sprintf( '(%s, %s, %s)', number_format( $hsl['h'], 0 ), $hsl['s'], $hsl['l'] );
		return $hsl;
	}

	protected function getTextColor( $color )
	{
		$hsl = $color;
		$hsl_sum = $hsl['h'] + $hsl['s'] + $hsl['l'];
		if ( $hsl_sum <= 255 ) {
			$color = '#fff';
		}
		else {
			$color = '#000';
		}
		return $color;
	}
}

function generate_colors( $args )
{
	if ( is_array( $args ) )
	{
		$generate_hsl_colors = new GenerateHSLColors();
		echo $generate_hsl_colors -> get();
	}
	else
	{
		return '<!-- Missing the directory to process. [generate-colors dir=""]-->';
	}
}

if( function_exists( 'add_shortcode' ) )
{
	// No direct access.
	defined('ABSPATH') || exit('No direct access.');

	//shortcode [json-index dir=""]
	add_shortcode( 'generate-colors', 'generate_colors' );
}
else
{
	/**
	 * Outside of WordPress. Instantiate directly, assuming current directory.
	 *
	 * @return string
	 */

	/** No direct access */
	define('NDA', true);

	$generate_hsl_colors = new GenerateHSLColors();
	echo $generate_hsl_colors -> get();
}
