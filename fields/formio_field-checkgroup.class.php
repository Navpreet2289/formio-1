<?php

require_once(FORMIO_FIELDS . 'formio_field-radiogroup.class.php');

class FormIOField_Checkgroup extends FormIOField_Radiogroup
{
	public $subfieldBuildString = '<label><input type="checkbox" name="{$name}[{$value}]"{$disabled? disabled="disabled"}{$checked? checked="checked"} /> {$desc}</label>';

	protected function getNextOptionVars()
	{
		if (!$vars = parent::getNextOptionVars()) {
			return false;
		}
		if (isset($this->value[$vars['value']])) {
			$val = $this->value[$vars['value']];
			$vars['checked'] = ($val === true || $val === 'on' || $val === 'true' || (is_numeric($val) && $val > 0));
		}
		return $vars;
	}
}
?>