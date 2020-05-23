<?php
namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface AdminContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdmins(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAdminById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    
    public function deleteAdmin($id);

    public function findByRole($role);
}