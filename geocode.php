<?php

/*

Value is stored as

$value = "formatted_address:lat:lng";

and is exposed as

$geo_array = array(
	0 => 'formatted_address',
	1 => 'lat',
	2 => 'lng'
);

*/

// Process value
$geo_array = str::split($value, ':');
$geo_name = (!!$value) ? $geo_array[0] : '';

// Color of the pin icon when selected
$color= c::get('panel.color');

// i18n placeholder
$ph = (isset($placeholder)) ? form::multilangtext($placeholder) : "";

?>

<select class="geocode-field"
		name="<?php echo $name ?>"
		placeholder="<?php echo $ph ?>"
		data-pin-color="<?php echo $color ?>"
		>
	<?php if (!!$value): ?>
		<option value="<?php echo $value ?>"><?php echo $geo_name ?></option>
	<?php endif ?>
</select>
