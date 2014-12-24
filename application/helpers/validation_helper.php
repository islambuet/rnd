<?php

class Validation_helper
{

    public static function validate_email($str)
    {
        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$str))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function validate_empty($str)
    {
        if (preg_match("/\S+/",$str))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function validate_numeric($str)
    {
        if (!preg_match("/^-?\d*\.?\d*$/",$str))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function validate_int($str)
    {
        if (!preg_match("/^[0-9]\d*$/",$str))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function validate_float($str)
    {
        if (!preg_match("/^[0-9]*[.][0-9]+$/",$str))
        {
            return false;
        }
        else
        {
            return true;
        }
    }


}