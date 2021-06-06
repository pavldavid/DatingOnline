<?php

/**
 * Class DatingDatalayer is where all aur data options are stored
 */
class DatingDatalayer{
    static function getOutdoor(){
        return array("Golf", "Hiking", "Canoeing", "Walking", "Swimming", "Running", "Climbing", "Fishing");
    }
    static function getIndoor(){
        return array("Anime", "Netflix", "Reading", "Chess", "Dancing", "Gaming", "Cooking", "Uno");
    }
    static function getStates(){
        return array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware',
            'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas',
            'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
            'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
            'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
            'West Virginia', 'Wisconsin', 'Wyoming');
    }
}


