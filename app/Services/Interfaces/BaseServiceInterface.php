<?php

namespace App\Services\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseServiceInterface
{
    public function all();
    public function findId($modeId,$columns = ['*'],$relation = []);
}
