<?php

namespace App\V1\Categories\Model;

use App\Api\V1\BaseController;
use App\Api\V1\Permissions\Permission;
use App\Http\Requests\Group;
use App\Http\Requests\Transformer\ModelTransformer;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Support\Facades\Lang;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ProductController extends BaseController
{
    /**
     * Get a list of all categories
     * @param Request $request
     * @return Array
     */
    public function index(Request $request)
    {
        $whereRaw = " and categories.type like '%".$search."%'";
        $categories = Product::select('categories.*')->whereRaw($whereRaw);

        $categories->get();

        return compact("categories");
    }

    /**
     * @param Product $role
     * @return \Dingo\Api\Http\Response
     */
    public function show(Product $category)
    {
        return compact("category");
    }

    /**
     * @param Product $category
     */
    public function destroy(Product $category)
    {
        $category->delete();
        $message = Lang::get('roles.deleted');

        return compact('message');
    }

    /**
     * @param Request $request
     * @param Product $role
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, Product $category)
    {
        (new Categoryservice())->update($category, $request->all());

        return compact("category");
    }

    /**
     * Add a role
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $this->isGranted('roles', 'edit');

        $role = new Product();

        $data = $request->all();
        $data['company_id'] = session('X-Company-Id');

        $v = \Validator::make($data, $role->getRules());
        if ($v->fails()) {
            throw new StoreResourceFailedException('Missing required fields or invalid information.', $v->errors());
        }

        if ($role = (new Roleservice())->add($data)) {
            return $this->item($role, new ModelTransformer(Group::ALL))->setStatusCode(201);
        }
        throw new ConflictHttpException(Lang::get('roles.notFound'));
    }



    /**
     * Add permissions to roleID
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function storePermissions(Request $request, Product $role)
    {
        $this->isGranted('roles', 'edit');

        $data = $request->all();
        $data['role_id'] = $role->id;

        if (!isset($data['permissions'])) {
            throw  new ConflictHttpException(Lang::get('roles.permissionsNotExists'));
        }

        if ($role->company_id != session("X-Company-Id")) {
            throw new ConflictHttpException(Lang::get('roles.companyError'));
        }

        (new Roleservice())->assignPermissions($data);

        return $this->item($role, new ModelTransformer(Group::EDIT));

    }

    /**
     * @param Product $role
     * @param Permission $permission
     */
    public function destroyPermissions(Product $role, Permission $permission)
    {
        $this->isGranted('roles', 'edit');

        if ($role->company_id != session("X-Company-Id")) {
            throw new ConflictHttpException(Lang::get('roles.companyError'));
        }

        (new Roleservice())->removePermissions($role->id, $permission->id);
        $message = Lang::get('roles.permissionDeleted');

        $this->removed($message);

        return response()->json(compact('code','status', 'message'));
    }


    /**
     * Search for a role
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function search(Request $request)
    {
        if ($this->userService->hasRole($request->currentUser, 'admin')) {
            $roles = $this->roleService->search($request->all());
            if (count($roles) > 0) {
                return $this->response->collection($roles, new ModelTransformer(Group::ALL));
            }
            throw new ConflictHttpException(Lang::get('roles.notFound'));
        }
    }
}