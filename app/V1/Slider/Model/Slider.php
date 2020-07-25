<?php

namespace App\V1\Slider\Model;

use App\V1\BaseModel;
use App\V1\Files\Model\File;
use App\V1\Files\WithFiles;

/**
 * Class Slider
 * @package App\V1\News\Model
 */
class Slider extends BaseModel implements WithFiles
{
    /**
     * @var string
     */
    protected $table = 'sliders';

    protected $tableAlias = 'sliders.';

    protected $primarySearchColumn = 'title';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'link'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'title' => 'string|max:255',
        'description' => 'string',
        'link' => 'string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany(File::class, 'attachable');
    }

    /**
     * @param File $file
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addFile(File $file)
    {
        return $this->attachments()->save($file);
    }

    /**
     * @inheritdoc
     */
    public function findByOwner($idModel, $owner)
    {
        return $this->findOrFail($idModel);
    }
}