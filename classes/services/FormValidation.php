<?php
namespace Services;


class FormValidation
{

	public static function sanitize($field): string
	{
		$field = htmlspecialchars($field);
		$field = stripslashes($field);
		$field = trim($field);
		return $field;
	}

	public static function checkLength($field, $length)
	{
		$fieldLength = strlen($field);
		return $fieldLength >= $length ?: false;
	}

	public static function checkIfFieldsFilled($fields)
	{
		$filled = 0;
		foreach ($fields as $field) {
			if (!empty($field)) {
				$filled++;
			}
		}
		return $filled === count($fields);
	}

	public static function checkEmail($email): bool
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}