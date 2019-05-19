<?php

namespace App\Interfaces;

/**
 * @package App\Controller
 */
interface RepoInterface{
    /**
     * @return null|object
     */
    public function getRepo() :?object;
}