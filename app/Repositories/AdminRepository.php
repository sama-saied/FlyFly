<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Contracts\AdminContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class AdminRepository extends BaseRepository implements AdminContract
{
   
    public function __construct(Admin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdmins(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAdminById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function deleteAdmin($id)
    {
        $admin = $this->findAdminById($id);

        $admin->delete();

        return $admin;
    }

    public function findByRole($role)
    {
        $admin = Admin::where('role', $role)->first();

        return $admin;
    }

}