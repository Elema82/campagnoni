<?php

namespace App\V1\Files;

use App\V1\Files\Model\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Trait FilesTrait
 * @package App\Api\V1\Files
 */
trait FilesTrait
{
    /**
     * @var string
     */
    protected static $s3Url = 'amazonaws.com/';

    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * @var string
     */
    public $folder = 'images/products';

    /**
     * @param string $name
     */
    public function setFolderName($name)
    {
        $this->folder = $name;
    }

    /**
     *
     */
    public function performUploadFile()
    {
        if (!property_exists($this, 'file')) {
            return;
        }

        $this->folder_name = $this->folder;

        $this->readFile($this->getAttribute('file'));
        $this->url_path = $this->baseUrl() . $this->getFilePath();

        unset($this->file);
    }

    /**
     * @param UploadedFile $file
     */
    private function readFile(UploadedFile $file)
    {
        $this->file_name = time() . rand(1,999999999). '.' . $file->getClientOriginalExtension();
        $this->original_name = $file->getClientOriginalName();
        $this->mime_type = $file->getClientMimeType();
        $this->size = $file->getClientSize();
    }

    /**
     * @return bool
     */
    public function isValid()
    {
//        if(preg_match('/^image/', $this->mime_type))
//        {
//            if($this->size >= 3000000)
//                throw new ConflictHttpException("The input file is very large");
//        }
//        else {
//            // no image
//            if ($this->size >= 10000000){
//                throw new ConflictHttpException("The input file is very large");
//            }
//        }
        return true;
    }

    /**
     * @return string
     */
    public function baseUrl()
    {
        return env('APP_URL') . '/';
    }

    /**
     *
     */
    public static function boot() {
        parent::boot();

        static::saving(function(File $model) {
            try {
                $model->performUploadFile();

                if($model->isValid()) {
                    //dd($model->getFilePath());
                    Storage::disk('public')->put($model->getFilePath(), file_get_contents($model->getAttribute('file')), 'public');
                    unset($model->file);
                }

            } catch (StorageGatewayException $e) {
                throw $e;
            }
        });

        static::deleting(function (File $model) {
            try {
                Storage::disk('local')->delete($model->getFilePath());
            } catch (StorageGatewayException $e) {
                throw $e;
            }
        });
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return 'public/'.$this->folder_name . '/' . $this->file_name;
    }
}