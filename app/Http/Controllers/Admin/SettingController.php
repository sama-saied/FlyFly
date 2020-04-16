<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Setting;
use App\Traits\UploadAble;

use Illuminate\Http\UploadedFile;

class SettingController extends BaseController
{
    use UploadAble;

    /**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function index()
{
    $this->setPageTitle('Settings', 'Manage Settings');
    return view('admin.settings.index');
}


/**
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function update(Request $request)
{
    if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

        if (config('settings.site_logo') != null) {
            $this->deleteOne(config('settings.site_logo'));
        }

        $logo = $this->UploadOne($request->file('site_logo'), 'img');
        Setting::set('site_logo', $logo);
    }
        /*
Firstly we are checking if the Request has the site_logo and it is an instance of 
UploadedFile class (means a file is uploaded)then before saving site logo,
 we are checking if there is already a site logo uploaded already
        */
 
    
    elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

        if (config('settings.site_favicon') != null) {
            $this->deleteOne(config('settings.site_favicon'));
        }
        $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
        Setting::set('site_favicon', $favicon);

    } 
    /*
    we are checking if there is already a site logo uploaded already
If yes, delete it and then upload the logo using uploadOne() method defined
 in UploadAble trait.
 When logo is uploaded it will resturn the path of logo with it’s file name
  generated randomly, we are setting the site_logo vlaue in database using 
  the Setting facade.Same thing we are doing for the site_favicon
    */

    else 
    {

        $keys = $request->except('_token');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }
    }
    /*
If there is no file uploaded, means form is submited other than the logo.blade.php
 file, we are taking the whole $request except _token and running a loop on them
  and adding the values to database.
    */
    return $this->responseRedirectBack('Settings updated successfully.', 'success');
/*
Finally, we are redirecting user back to the settings page using 
responseRedirectBack() method defined in the BaseController. 
Note that how we are sending user back and setting the flash message 
at the same time
*/
}

}