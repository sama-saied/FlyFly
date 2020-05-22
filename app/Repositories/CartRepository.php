<?php
namespace App\Repositories;

use App\Models\Cartt;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BrandContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class CartRepository extends BaseRepository 
{
    use UploadAble;

public function findCartById(int $id)
{
    $c = Cartt::where('id',$id);
    return $c;

    /*
    try {
        return $this->findOneOrFail($id);

    } catch (ModelNotFoundException $e) {

        throw new ModelNotFoundException($e);
    }*/

}

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCart($id)
    {
        $product = Cartt::where('id',$id);

        $product->delete();

        return $product;
    }

}