<?php
    function convertToFullTime($myhour, $myminute, $mymeridien) {
        if($mymeridien == "PM") {
            $myhour += 12;
        }
        return $myhour.':'.$myminute.':00';
    }

    function getDateModified($myhour, $myminute, $mymeridien, $bonus_minute, $chara) {
        if(($chara != '-' && $chara != '+') || ($bonus_minute > 59 || $bonus_minute < 0)) {
            return null;
        }

        if($chara == '+') {
            if(($myminute + $bonus_minute) > 59) {
                if($myhour + 1 > 11) {
                    if($mymeridien == 'AM') {
                        $mymeridien = 'PM';
                    } else {
                        $mymeridien = 'AM';
                    }
                    $myhour = 0;
                } else {
                    $myhour++;
                }
                $myminute = ($myminute + $bonus_minute) % 60;
            } else {
                $myminute += $bonus_minute;
            }
        } else {
            if(($myminute - $bonus_minute) < 0) {
                if($myhour - 1 < 0) {
                    if($mymeridien == 'AM') {
                        $mymeridien = 'PM';
                    } else {
                        $mymeridien = 'AM';
                    }
                    $myhour = 11;
                } else {
                    $myhour --;
                }
                $myminute = 60 + ($myminute - $bonus_minute);
            } else {
                $myminute -= $bonus_minute;
            }
        }

        return convertToFullTime($myhour, $myminute, $mymeridien);
    }
?>
