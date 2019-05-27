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
     * @return mixed
     */
    public function createEmpty(object $object) :void;
}
