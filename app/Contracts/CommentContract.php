<?php
namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface CommentContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listComments(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCommentById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    
    public function deleteComment($id);

    
}