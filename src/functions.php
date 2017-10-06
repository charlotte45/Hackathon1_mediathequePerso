<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 06/10/17
 * Time: 03:00
 */

function cleanVar(string $input)
{
    return htmlentities(trim($input));
}