<?php
/*
	MYSTlore D'ni Tag for MediaWiki
	http://code.google.com/p/mystlore/

	Created 2006-11-05 by Soeren Kuklau

	Copyright 2006-07 MYSTlore contributors. Some rights reserved.

	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

	The full license can be retrieved at:
	http://www.opensource.org/licenses/mit-license.php
*/

/**
 * This class handles formatting D'ni script in WikiText, specifically anything within
 * <dni></dni> tags.
 */

class DniTag {
	/**
	 * Bind the renderDniTag function to the <d'ni> tag
	 * @param Parser $parser
	 * @return bool true
	 */
	public static function onParserSetup( Parser &$parser ) {
		$parser->setHook( "dni", "DniTag::renderDniTag" );
		return true;
	}

	/**
	 * Parse the text to be wrapped in a span with the necessary class
	 * @param string $in The text inside the d'ni tag
	 * @param array $param
	 * @param Parser $parser
	 * @param boolean $frame
	 * @return string
	 */
	public static function renderDniTag( $input, array $param, Parser $parser, PPFrame $frame ) {
// 		return '<span class="dni">'.$in.'</span>';
		$attribs = array(
			'class' => 'dni'
		);
		$output = $parser->recursiveTagParse($input, $frame);
// 		return $input;
		return Html::rawElement('span', $attribs, trim($output));
// 		return Html::rawElement( 'div', $attribs, $newline . trim( $text ) . $newline );
	}
}
