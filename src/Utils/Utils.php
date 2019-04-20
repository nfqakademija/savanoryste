<?php

namespace App\Utils;

use App\Constants;

/**
 * Class Utils
 * @package App\Utils
 */
class Utils{

    /**
     * embeds additional data into selected volunters list. e.x Events,Reviews
     * @param array $volunteers
     * @param $repository - Object of $this->getDoctrine()->getRepository(Event::class)
     * @return array
     */
    public static function VolunteerStructurize(array $volunteers, Object $repository) :array {
        $structure = array(
            Constants::VOLUNTEERS => []
        );

        $columns = Constants::VOLUNTER_TABLE_COLUMN_NAMES;
        for($i=0;$i<count($volunteers);$i++){
            for($j=0;$j<count($columns);$j++){
                $structure[Constants::VOLUNTEERS][$i][$columns[$j]] = $volunteers[$i][$columns[$j]];
            }
            $structure[Constants::VOLUNTEERS][$i]['Events'] = $repository->getEventsByVolunteerId($volunteers[$i]['id']);

        }

        return $structure;
    }

}