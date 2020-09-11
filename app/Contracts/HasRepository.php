<?php

namespace App\Contracts;

use App\Repositories\BaseRepository;

/**
 * Interface HasRepository
 * @package App\Contracts
 * @author Vi Nguyen <vinguyen.dev@gmail.com>
 */

interface HasRepository
{
    /**
     * @return BaseRepository
     */
    public function getRepositoryInstance();
}
