<?php

namespace WP4Me_Title_Remover;

function getKeyName($name, $seperator = "_")
{
    return PLUGIN_PREFIX . $seperator . $name;
}

/**
 * Helper funciton to process variable length argument lists
 * Returns key value array.
 *
 * @param array $map
 * @param array|null $args
 * @return void
 * 
 */
function map($map, $args = null)
{
    $return = [];

    if (!is_array($args)) {
        $args = [];
    }

    foreach ($map as $key => $value) {

        if (key_exists($key, $args)) {
            $return[$value] = $args[$key];
        } else {
            $return[$value] = null;
        }
    }

    return $return;
}
