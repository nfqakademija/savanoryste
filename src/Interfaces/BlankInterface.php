<?php

namespace App\Interfaces;

/**
 * Interface BlankInterface
 * @package App\Entity
 */
interface BlankInterface
{

    /**
     * @param object $object
     */
    public function createEmpty(object $object) :void;
}
