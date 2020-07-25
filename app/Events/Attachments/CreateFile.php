<?php

namespace App\Events\Attachments;

use App\V1\BaseModel;
use App\V1\Files\Model\File;
use App\Events\Event;

/**
 * Class CreateAttachment
 * @package app\Events
 */
class CreateFile extends Event
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var File
     */
    private $file;

    /**
     * @var BaseModel
     */
    private $parentEntity;

    /**
     * CreateFile constructor.
     * @param File $file
     * @param $data
     * @param BaseModel $parentEntity
     */
    public function __construct(File $file, $data, BaseModel $parentEntity)
    {
        $this->file = $file;
        $this->data = $data;
        $this->parentEntity = $parentEntity;
    }

    /**
     * @return BaseModel
     */
    public function getParentEntity()
    {
        return $this->parentEntity;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

}