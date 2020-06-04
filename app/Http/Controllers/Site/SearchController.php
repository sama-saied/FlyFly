<?php


namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {
        return view('site.pages.search');
    }
 */
    /**
     * search records in database and display  results
     * @param  Request $request [description]
     * @return view      [description]
     */

       
    public function search( Request $request)
    {
        

        $searchterm = $request->input('query');
       // $image = route('k');
 
        $searchResults = (new Search())
                    ->registerModel(\App\Models\Product::class, 'name')
                    ->registerModel(\App\Models\Category::class, 'name')
                    ->registerModel(\App\Models\Brand::class, 'name')
                    ->perform($searchterm);
                            
    return view('site.pages.search', compact('searchResults', 'searchterm'/*,'image'*/));
    
}

    public function k()
{
    return view('test');
}

   
}
