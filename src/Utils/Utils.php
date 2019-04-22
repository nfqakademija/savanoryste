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
    public static function volunteerStructurize(array $volunteers, Object $repository) :array {
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


    /**
     * @param array $event
     * @return array|null
     */
    public static function buildEventStructure(array $event) :?array
    {
        $events = array();
        foreach($event as $key => $value){
            $events[$key] = [
                'id'                => $value->getId(),
                'organisation'      => [
                    'id'            => $value->getOrganisation()->getId(),
                    'name'          => $value->getOrganisation()->getName(),
                    'email'         => $value->getOrganisation()->getEmail(),
                    'phone'         => $value->getOrganisation()->getPhone(),
                    'address'       => $value->getOrganisation()->getAddress()
                ],
                'title'             => $value->getTitle(),
                'start_date'        => $value->getStartDate(),
                'end_date'          => $value->getEndDate(),
                'description'       => $value->getDescription()
            ];
        }
        return $events;
    }

    /**
     * @param array $volunteers
     * @param array $reviews - all reviews
     * @param int $volunteerId
     * @return array
     */
    public static function buildSingleVolunteerStructure(array $volunteers, array $reviews, int $volunteerId) :?array{
        $counter = 1;
        foreach($volunteers as $keyVol => $volunteer){
            foreach($reviews as $keyRev => $review) {
                $volunteers[$keyVol] = [
                    'id' => $volunteer->getId(),
                    'firstname' => $volunteer->getFirstName(),
                    'lastname' => $volunteer->getLastName(),
                    'phone' => $volunteer->getPhone(),
                    'email' => $volunteer->getEmail(),
                    'job_type' => $volunteer->getJobType()
                ];
                if ($volunteerId == $review->getVolunteer()->getId()) {
                    $volunteers['Reviews'][$counter] = [
                        'id'        => $review->getId()
                    ];
                    $counter++;
                }

            }
        }

        return $volunteers;
    }


    /**
     * @param array $organisations
     * @return array|null
     */
    public static function buildOrganisationStructure(array $organisations) :?array
    {
        $org = array();
        foreach($organisations as $key => $organisation){
            $org[$key] = [
                'id'        => $organisation->getId(),
                'name'      => $organisation->getName(),
                'email'     => $organisation->getEmail(),
                'phone'     => $organisation->getPhone(),
                'address'   => $organisation->getAddress()
            ];
        }

        return $org;
    }

    /**
     * @param array $reviews
     * @return array|null
     */
    public static function buildReviewStructure(array $reviews) :?array
    {
        $rev = array();
        foreach($reviews as $key => $review){
            $rev[$key] = [
                'id'            => $review->getId(),
                'review_body'   => $review->getReviewBody(),
                'review_rating' => $review->getReviewRating()
            ];
        }
        return $rev;
    }

}