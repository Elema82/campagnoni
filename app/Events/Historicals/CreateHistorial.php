<?php

namespace App\Events\Historicals;

use App\Api\V1\BaseModel;
use App\api\V1\Historical\Historial;
use App\Events\Event;

/**
 * Class CreateHistorial
 * @package app\Events
 */
class CreateHistorial extends Event
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Historial
     */
    private $historial;

    /**
     * @var BaseModel
     */
    private $entity;

    /**
     * CreateHistorial constructor.
     * @param BaseModel $entity
     * @param array $data
     */
    public function __construct(BaseModel $entity, array $data)
    {
        $this->historial = new Historial();
        $this->data = $data;
        $this->entity = $entity;
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return Historial
     */
    public function getHistorial()
    {
        return $this->historial;
    }

    /**
     * @return BaseModel
     */
    public function getEntity()
    {
        return $this->entity;
    }




}