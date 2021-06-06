<?php

class Validation
{
    static function validName($name): bool
    {
        if(!empty($name) && (preg_match('/^[A-Za-z]+$/' ,$name) == 1 )){
            return true;
        }
        return false;
    }

    static function validAge($age): bool
    {
        if (($age >= 18 || $age <= 118) && (!empty($age) && is_numeric($age))) {
            return true;
        }
        return false;

    }

    static function validPhone($phone): bool
    {
        $regex = "/^[(]?\d{3}[)]?[(\s)?.-]\d{3}[\s.-]\d{4}$/";

        if (!empty($phone) && (preg_match($regex, $phone) == 1)) {
            return true;
        }
        return false;

    }

    static function validEmail($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
            return true;
        }
        return false;
    }

    static function validOutdoor($outdoor): bool
    {
        $outdoorCheck = DatingDatalayer::getOutdoor();

        foreach ($outdoor as $choice) {
            if (!empty($outdoor) && !in_array($choice, $outdoorCheck)) {
                return false;
            }
        }
        return true;
    }

    static function validIndoor($indoor): bool
    {
        $indoorCheck = DatingDatalayer::getIndoor();

        foreach ($indoor as $choice) {
            if (!empty($indoor) && !in_array($choice, $indoorCheck)) {
                return false;
            }
        }
        return true;
    }
}



