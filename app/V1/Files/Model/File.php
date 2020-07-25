<?php

namespace App\V1\Files\Model;

use App\V1\BaseModel;
use App\V1\Files\FilesTrait;

/**
 * Class Attachment
 * @package App\Api\V1\Attachments\Model
 */
class File extends BaseModel
{
    use FilesTrait;

    protected $table = 'files';

    public $rules = [];

    /**
     * @param string $group
     * @return array
     */
    public function fieldsForGroup($group)
    {
        return ['id', 'original_name', 'url_path', 'mime_type'];
    }

    /**
     * @param int $idModel
     * @param int $owner
     * @return mixed
     */
    public function findByOwner($idModel, $owner)
    {
        return $this->findOrFail($idModel);
    }

}