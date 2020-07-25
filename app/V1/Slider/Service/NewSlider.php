<?php

namespace App\Api\V1\Slider\Service;

use App\Events\Attachments\CreateFile;
use App\V1\Files\Model\File;
use App\V1\News\Model\News;
use App\V1\Slider\Model\Slider;

/**
 * Class NewSlider
 * @package App\Api\V1\News\Service
 */
class NewSlider
{
    /**
     * @param $data
     * @return News
     */
    public function add($data)
    {
        $slider = new Slider();

        $slider->fill($data);

        if(!$errors = $slider->isValid()) {
            return view('adminlte::slider/create', ['new' => $slider, 'errors' => $errors]);
        }

        $slider->save();

        if(array_get($data, 'thumbnail'))
        {
            $data['file'] = $data['thumbnail'];
            $attachment = $this->addAttachment($slider, $data);
            $slider->setAttribute('img_thumbnail',  $attachment->id);
            $slider->save();
            unset($data['file']);
        }

        if(array_get($data, 'principal'))
        {
            $data['file'] = $data['principal'];
            $attachment = $this->addAttachment($new, $data);
            $new->setAttribute('img_principal',  $attachment->id);
            $new->save();
            unset($data['file']);
        }

        if(array_get($data, 'imagenes') && (!empty($data['imagenes'])))
        {
            foreach ($data['imagenes'] as $imagen)
            {
                $data['file'] = $imagen;
                $attachment = $this->addAttachment($new, $data);
                unset($data['file']);
            }
        }

        return $new;
    }

    /**
     * @param News $new
     * @param $request
     * @return File
     */
    public function addAttachment(News $new, $request)
    {

        $attachment = new File();
        $attachment->setFolderName('task-attachment');
        event(new CreateFile($attachment, $request, $new));

        return $attachment;
    }

    public function update(News $new, $data)
    {
        $new->fill($data);

        if(!$errors = $new->isValid()) {
            return view('adminlte::slider/create', ['product' => $new, 'errors' => $errors]);
        }

        $new->save();

        // imagenes
        if(array_get($data, 'principal')) {
            foreach ($new->attachments()->getResults() as $image){
                if($image->id == $new->img_principal)
                    $image->delete();
            }
            $data['file'] = $data['principal'];
            $attachment = $this->addAttachment($new, $data);
            $new->setAttribute('img_principal',  $attachment->id);
            $new->save();
            unset($data['file']);
        }

        if (array_get($data ,'removeall') && $data['removeall'])
        {
            foreach ($new->attachments()->getResults() as $image) {
                $image->delete();
            }
        }

        if(array_get($data, 'imagenes') && (!empty($data['imagenes'])))
        {
            foreach ($new->attachments()->getResults() as $image) {
                if($image->id != $new->img_principal && $image->id != $new->img_thumbnail)
                    $image->delete();
            }

            foreach ($data['imagenes'] as $imagen)
            {
                $img['file'] = $imagen;
                $attachment = $this->addAttachment($new, $img);
                $new->save();
                $img['file'] = '';
            }
        }

        $new->save();

        return $new;
    }

    /**
     * Delete a role from the database
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        /** @var News $new */
        $new = News::find($id);

        $new->delete();
        return true;
    }

}