<?php

namespace App\V1\News\Model;

use App\V1\BaseModel;
use App\V1\Files\Model\File;
use App\V1\Files\WithFiles;
/**
 * Class News
 * @package App\api\V1\News
 */
class News extends BaseModel implements WithFiles
{
    /**
     * @var string
     */
    protected $table = 'news';

    protected $tableAlias = 'n.';

    protected $primarySearchColumn = 'title';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'status'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'title' => 'required|string|max:255',
        'short_description' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|boolean'
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