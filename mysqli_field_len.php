<?php

if (!function_exists("mysqli_field_len")) {
    function mysqli_field_len($result, $field_offset) {
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->length : null;
    }
}

?>
