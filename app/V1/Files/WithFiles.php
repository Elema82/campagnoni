<?php

namespace App\V1\Files;

use App\V1\Files\Model\File;

/**
 * Interface WithFiles
 * @package App\Api\V1\Files
 */
interface WithFiles
{
    /**
     * @param File $file
     */
    public function addFile(File $file);
}