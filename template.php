<?php

defined('NDA') || exit;

/**
 * Color Template
 *
 * Generates the article HTML and Page HTML necessary to view the colors
 * in a browswer.
 */
class ColorTemplate extends GenerateHSLColors
{
	/** Default options */
	protected $opts = [
		'max' => 240,
	];

	/**
	 * Get HTML from HSL
	 *
	 * @param array $colors
	 *
	 * @return string
	 */
	protected function getHTMLfromHSL( $colors )
	{

		$cnt = 0;
		$hue = 0;
		$max = $this->opts['max'];

		$str = '<article class="one">' . PHP_EOL;
		$str .= '<div class="json" style="font-size: 80%;">' . PHP_EOL;
		$str .= '<div class="line">' . PHP_EOL;

		foreach ($colors as $k => $color)
		{
			$cnt++;
			if( $cnt <= $max )
			{
				$hue = $color['h'];
				if ( $hue <> $color['h'] ) { $line = true; }
				$str .= $line ? '<div class="line border">' . PHP_EOL : '';
				$str .= '<div class="unit size1of4" style="border-radius: 3px;">' . PHP_EOL;
				$str .= '<div class="border" style="padding: 3px;">' . PHP_EOL;
				$str .= '<div class="inner text-center" style="min-height: 46px; padding:6px; ' . PHP_EOL;
				$str .= sprintf( 'background: hsl(%s, %s%%, %s%%);', $color['h'], $color['s'], $color['l'] );
				$str .= sprintf( 'color: %s">', $this->getTextColor( $color ) );
				$str .= 0 ? sprintf('%s<br />%s', $color->name, PHP_EOL) : '';
				$str .= 0 ? sprintf('%s<br />%s', $color->hexString, PHP_EOL) : '';
				$str .= 0 ? sprintf('%s<br />%s', $this->getRGBValue( $color->rgb ), PHP_EOL) : '';
				$str .= 1 ? sprintf('<br />%s. %s<br /><br />%s', $k, $this->getHSLValue( $color ), PHP_EOL ) : '';
				$str .= 0 ? sprintf('%s%s', $this->getWavelength( $color ), PHP_EOL) : '';
				$str .= '</div>' . PHP_EOL;
				$str .= '</div>' . PHP_EOL;
				$str .= '</div>' . PHP_EOL;
				$str .= $line ? '</div>' . PHP_EOL : '';
			}
			else
			{
				break;
			}
		}
		$str .= '</div>' . PHP_EOL;
		$str .= '</div>' . PHP_EOL;
		$str .= '</article>' . PHP_EOL;
		return $str;
	}

	/**
	 * Wrap the string in page HTML `<!DOCTYPE html>`, etc.
	 *
	 * @param string $str
	 * @return string
	 */
	protected function getPageHtml( $html )
	{
		$str = '<!DOCTYPE html>' . PHP_EOL;
		$str .= '<html class="dynamic" lang="en-CA">' . PHP_EOL;
		$str .= '<head>' . PHP_EOL;
		$str .= '<meta charset="UTF-8">' . PHP_EOL;
		$str .= '<meta name="viewport" content="width=device-width, initial-scale=1"/>' . PHP_EOL;
		$str .= '<title>JSON File</title>' . PHP_EOL;
		$str .= '<meta name="robots" content="noindex,nofollow" />' . PHP_EOL;
		$str .= '<link rel=stylesheet href="/0/theme/css/style.css">' . PHP_EOL;
		$str .= '</head>' . PHP_EOL;
		$str .= '<body>' . PHP_EOL;
		$str .= '<main>' . PHP_EOL;
		$str .= $html;
		$str .= '</main>' . PHP_EOL;
		$str .= '<footer>' . PHP_EOL;
		$str .= '<div class="text-center"><small>';
		$str .= 'Note: This page has been <a href="https://github.com/earth3300/ec01-colors">automatically generated</a>. No header, footer, menus or sidebars are available.';
		$str .= '</small></div>' . PHP_EOL;
		$str .= '</footer>' . PHP_EOL;
		$str .= '</html>' . PHP_EOL;

		return $str;
	}
}
