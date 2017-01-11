<?php
function is_valid_dir($name)
{
    if (strpbrk($name, "\\/?%*:|\"<>") === FALSE)
    {
        return TRUE;
    }
    return FALSE;
}

function escape_whitespace($string)
{
    return preg_replace("/ /", "-", $string);
}

function empty_rows($result)
{
    if($result->num_rows == 0)
    {
        return true;
    }
    return false;
}
?>