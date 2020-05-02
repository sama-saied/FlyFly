<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
  {
   $this->middleware('auth');
  }
   
    public function store(Request $request , $product_id)
    {
    	$this->validate($request ,[
            'body'=>'required'
        ]);
       
        $comment=new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $product_id;
        $comment->body =$request->input('body');
        $comment->save();
        return redirect()->back();
    }

   
}
