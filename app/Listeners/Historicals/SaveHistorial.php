<?php

namespace App\Listeners\Historicals;

use App\api\V1\Historical\Historial;
use App\Events\Historicals\CreateHistorial;

/**
 * Class SaveHistorial
 * @package App\Listeners
 */
class SaveHistorial
{
    /**
     * @param CreateHistorial $event
     */
    public function handle(CreateHistorial $event)
    {
        /**
         * @var $historial Historial
         */
        $historial = $event->getHistorial();
        $data = $event->getData();
        $parentEntity = $event->getEntity();

        $historial->fill($data);
        $historial->save();
        $parentEntity->historicals()->save($historial);
    }
}