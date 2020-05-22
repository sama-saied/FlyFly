<?php
namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface CartContract
{

    /**
     * @param int $id,$ud
     * @return mixed
     */
    public function findCartById(int $id);


       /**
     * @param $id
     * @return bool
     */
    public function deleteCart($id);
}