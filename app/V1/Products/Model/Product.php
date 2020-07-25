<?php

namespace App\V1\Products\Model;

use App\V1\BaseModel;
use App\V1\Categories\Model\Category;
use App\V1\Files\Model\File;

/**
 * Class Category
 * @package App\Api\V1\Categories
 */
class Product extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'img_principal',
        'img_thumbnail'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'integer',
        'img_principal' => 'integer|exists:files,id',
        'img_thumbnail' => 'integer|exists:files,id'
    ];

    public $timestamps = false;

    /**
     * @param int $id
     * @param int $owner
     * @return mixed
     */
    public function findByOwner($id, $owner)
    {
        return $this->findOrFail($id);
    }

    public function isValid()
    {
        /**
         * @var $validator Validator
         */

        $validator = \Validator::make($this->toArray(), $this->rules);

        if ($validator->fails()) {
            return  $validator->getMessageBag();
        }

        return true;
    }

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

    public function attributes()
    {
        return $this->hasMany(ProductAttributes::class);
    }

    public function addAttribute(ProductAttributes $attribute)
    {
        return $this->attributes()->save($attribute);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function getImgsSlider()
    {
        $slider = [];
        foreach ($this->attachments()->getResults() as $image)
        {
            if($image->id != $this->img_thumbnail && $image->id != $this->img_principal) {
                $slider[] = $image;
            }
        }

        return $slider;
    }

    private function getExplodeName()
    {
        $name = explode(' ',$this->name);
        return $name;
    }

    public function getVentilationName()
    {
        $name = $this->getExplodeName();

        $txt ='<div class="info"><h2>'.$name[0].'</h2><span>&nbsp;·&nbsp;</span>';

        if(isset($name[1]))
        {
            $txt.='<p class="txt1">'.$name[1];
            if(count($name) > 2){
                for($i=2;$i < count($name);$i++)
                {
                    $txt.=' '.$name[$i];
                }
            }
            $txt.='</p></div>';
        }

        return $txt;
    }
}
