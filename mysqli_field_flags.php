<?php

if (!function_exists("mysqli_field_flags")) {
    function mysqli_field_flags($result, $field_offset) {
        static $flags;
        $flags_num = mysqli_fetch_field_direct($result, $field_offset)->flags;
        if (!isset($flags)) {
            $flags = array();
            $constants = get_defined_constants(true);
            foreach ($constants['mysqli'] as $c => $n) if (preg_match('/MYSQLI_(.*)_FLAG$/', $c, $m)) if (!array_key_exists($n, $flags)) $flags[$n] = $m[1];
        }
        $result = array();
        foreach ($flags as $n => $t) if ($flags_num & $n) $result[] = $t;
        $return = implode(' ', $result);
        $return = str_replace('PRI_KEY','PRIMARY_KEY', $return);
        $return = strtolower($return);
        return $return;
    }
}

?>
