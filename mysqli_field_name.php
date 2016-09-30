<?php

if (!function_exists("mysqli_field_name")) {
    function mysqli_field_name($result, $field_offset) {
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->name : null;
    }
}

?>
