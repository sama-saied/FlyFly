<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Contracts\CommentContract;
use App\Http\Controllers\BaseController;


class CommentControl extends BaseController
{

    protected $commentRepository;

    public function __construct(CommentContract $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function view()
    {
        $comments = $this->commentRepository->listComments();
        $this->setPageTitle('Comments', 'List of all comments');
        return view('admin.comment.view', compact('comments')); 
    }

    public function delete($id)
{
    $comment = $this->commentRepository->deleteComment($id);

    if (!$comment) {
        return $this->responseRedirectBack('Error occurred while deleting Comment.', 'error', true, true);
    }
    return $this->responseRedirect('comment.view', 'comment deleted successfully' ,'success',false, false);
}
}
