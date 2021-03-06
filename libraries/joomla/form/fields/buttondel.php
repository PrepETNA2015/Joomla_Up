<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;


class JFormFieldButtondel extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Buttondel';

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   11.1
	 */
protected function getInput()
	{
		// Initialize some field attributes
		
		$class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$style = "style='height:30px;width:40px;'";/*margin-left:300px;margin-top:-120px;*/

		// Initialize JavaScript field attributes.
		$onclick = $this->onclick ? ' onclick="' . $this->onclick . '"' : '';

		// Including fallback code for HTML5 non supported browsers.
		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);

		return '<input type="button" name="' . $this->name . '"' . $class . ' id="' . $this->id . '" value="-"' . $onclick  . $style.'" />';
	}
	
}
