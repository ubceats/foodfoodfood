<?php

namespace ubceats;


class OpenTimeDecorator
{
    static function addCurrentStates(array $venues) : array
    {
        foreach ($venues as &$venue) {
            $time = date('Hi');
            $closes = (int) $venue['closesAt'];
            $opens = (int) $venue['opensAt'];

            if($closes < $opens){ // FIXME is this right?
                $venue['isOpen'] = ($time >= $opens) && ($time <= $closes + 2400) && ($opens != -1);
            }
            else {
                $venue['isOpen'] = ($time >= $opens) && ($time <= $closes) && ($opens != -1);

            }

        }
        return $venues;
    }


}