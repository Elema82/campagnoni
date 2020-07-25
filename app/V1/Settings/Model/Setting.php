<?php

namespace App\V1\Settings\Model;

use App\V1\BaseModel;
use Illuminate\Validation\Validator;

class Setting extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = [
        'key',
        'value'
    ];

    public $timestamps = false;

    /**
     * @var array
     */
    protected $rules = [
        'key' => 'required|string|max:255',
        'value' => 'required|string'
    ];

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
     * @param int $id
     * @param int $owner
     * @return mixed
     */
    public function findByOwner($id, $owner)
    {
        return $this->findOrFail($id);
    }

    /**
     * @return mixed
     */
    public static function getContactEmail()
    {
        $setting = Setting::where('key','=',"contact_email")->get();

        return $setting->first()->value;
    }
}
