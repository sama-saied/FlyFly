<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Contracts\AdminContract;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends BaseController
{
 
    protected $adminRepository;

  
    public function __construct(AdminContract $adminRepository)
    {
        $this->adminRepository = $adminRepository;
       
          $this->middleware('auth:admin');
       
    }

    public function view()
    {
        
        $admins = $this->adminRepository->listAdmins();
        $this->setPageTitle('Admins', 'List of all admins');
 
       // $a = auth()->guard('admin')->role ;
      //  if($a == 'super')
       
       
       // if(auth()->guard('admin')->role == 'super')
       // if(auth()->user()->first_name == 'Rahf')
      // if(auth()->admin()->role == 'super')
      //  {
        return view('admin.add_admin.view', compact('admins')); 
      /*  }
        else
        {
        return view('admin.add_admin.view2', compact('admins'));
        }*/
    }
public function add()
{
   $admins = $this->adminRepository->listAdmins('id', 'asc');
    $this->setPageTitle('Admins', 'Add Admin');  
    return view('admin.add_admin.add_admin', compact('admins'));    
}

public function delete($id)
{
    $admin = $this->adminRepository->deleteAdmin($id);

    if (!$admin) {
        return $this->responseRedirectBack('Error occurred while deleting Admin.', 'error', true, true);
    }
    return $this->responseRedirect('admin.view', 'admin deleted successfully' ,'success',false, false);
}

public function create(Request $request)
{
    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6|unique:admins'
    ]);

       $admin = new Admin;
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->password = Hash::make($request->password);
       $admin->role = $request->role;
       $admin->save();
       return $this->responseRedirect('admin.view', 'admin added successfully' ,'success',false, false);

}
}
