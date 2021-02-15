<?php

/**
 * Format date to rs format
 *
 * @param $date
 *
 * @return mix
 */
function format_date_rs($date)
{
    if (is_null($date)) {
        return;
    }

    return date('d.m.Y', strtotime($date));
}

/**
 * Format date to en format
 *
 * @param $date
 *
 * @return mix
 */
function format_date_en($date)
{
    if (is_null($date)) {
        return;
    }

    return date('Y-m-d H:i:s', strtotime($date));
}
