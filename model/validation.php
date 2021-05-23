<?php
/* validation.php
 * Validate data for the diner app
 *
 */

class Validation
{

    static function validName($name)
    {
        if(preg_match('/^\pL+$/u' ,$name) && strlen(trim($name)) >= 2){
            return true;
        }
        return false;
    }

    static function validAge($age)
    {
        if (($age >= 18 || $age <= 118) && (!empty($age) && is_numeric($age))) {
            return true;
        }
        return false;

    }

    static function validPhone($phone)
    {
        $regex = "^[(]?\d{3}[)]?[(\s)?.-]\d{3}[\s.-]\d{4}$";

        if (preg_match($regex, $phone) && !empty($phone)) {
            return true;
        }
        return false;

    }

    static function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
            return true;
        }
        return false;
    }

    static function validOutdoor($outdoor)
    {
        $outdoorCheck = DataLayer::getOutdoor();

        foreach ($outdoor as $choice) {
            if (!in_array($choice, $outdoorCheck)) {
                return false;
            }
        }
        return true;
    }

    static function validIndoor($indoor)
    {
        $indoorCheck = DataLayer::getIndoor();

        foreach ($indoor as $choice) {
            if (!in_array($choice, $indoorCheck)) {
                return false;
            }
        }
        return true;
    }
}