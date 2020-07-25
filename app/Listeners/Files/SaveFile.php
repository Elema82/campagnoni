<?php

namespace App\Listeners\Files;

use App\V1\Files\WithFiles;
use App\Events\Attachments\CreateFile;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class SaveFile
 * @package App\Listeners\Files
 */
class SaveFile
{
    /**
     * @param CreateFile $event
     */
    public function handle(CreateFile $event)
    {
        $file = $event->getFile();
        $data = $event->getData();

        /** @var WithFiles $parentEntity */
        $parentEntity = $event->getParentEntity();

        $datafile = $data['file'];

        $file->setAttribute('file', $datafile);

        $parentEntity->addFile($file);
    }
}