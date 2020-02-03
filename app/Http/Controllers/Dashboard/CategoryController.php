<?php

namespace App\Http\Controllers\Dashboard;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::when ($request->search, function($q) use ($request){

      return $q->where('name','like','%'.$request->search .'%');
    
        })->latest()->paginate(5);
    
        return view ("dashboard.categories.index",compact('categories'));
    }//end index

   
    public function create()
    {
        return view ("dashboard.categories.create");
    }//end create

    
    public function store(Request $request)
    {

        $rules =[];
        foreach (config('translatable.locales')as $locale) {

         //ar.*
         //name ar or en required

         $rules += [$locale . '.name' => 'required'];
      
        // $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];

      
     //  $rules += [$locale . '.name' => [Rule::unique('category_translations', column: 'name')ignore($category->id, idColumn)]];
        }//end of foreach
        $request->validate( $rules) ;      
           // [

            //'ar.name'=>'required|unique:category_translations,name',
       // ]);
        category::create($request->all());
        session()->flash('sucess',_('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    //public function show(category $category)
   // {
        //
    //}


   
    public function edit(category $category)
    {
       return view ('dashboard.categories.edit',compact('category'));
    }//end edit

 
    public function update(Request $request, category $category)
    {
      //  $request->validate([

//'name'=>'required|unique:categories,name,'.$category->id,

$request->validate([

    'ar.name'=>'required|unique:category_translations,name',
]);
      
        $category->update($request->all());
        session()->flash('success',_('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }//end update

   
    public function destroy(category $category)
    {
        $category->delete();
        session()->flash('success',_('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }//end destroy
}
