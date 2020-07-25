<?php

namespace App\Api\V1\Files\Controller;

use App\Api\V1\BaseController;
use App\Api\V1\Files\Model\File;
use App\Http\Requests\Group;
use App\Http\Requests\Transformer\ModelTransformer;
use Dingo\Api\Http\Request;

/**
 * Class AttachmentController
 * @package app\Api\V1\Attachments\Controller
 */
class FileController extends BaseController
{
    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $file = new File();
        $file->setAttribute('file', $request->file('file'));

        $file->saveOrFail();

        return $this->item($file, new ModelTransformer(Group::ALL));
    }

    /**
     * @param File $file
     * @return \Dingo\Api\Http\Response
     */
    public function show(File $file)
    {
        return $this->item($file, new ModelTransformer(Group::ALL));
    }

    /**
     * @param File $file
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        return $this->item($file, new ModelTransformer(Group::ALL));
    }
}