<?php
namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Models\Articles,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{


    public function ShowCategories()
    {
    $obj = new Articles();
    $data['categories'] = $obj->ListAllCategories();  
    return view('back.categories.table',$data);
    }
    
    public function AddCategory(){
       
    return view('back.categories.form');
    }
    
    public function EditCategory($id){
    $obj = new Articles();
    $data['category'] = $obj->activeCategory($id);     
    return view('back.categories.form',$data);
    }
    
    
    function DeleteCategory($id){
    
        \DB::table('articles')->where('categoryId',$id)->delete();    
        \DB::table('category')->where('categoryId',$id)->delete();    
        return redirect('/admin/ShowCategories');
        
    }
    
    function SaveCategory(Request $request){
    
        $categoryId = $request->input('categoryId');
        $categoryTitle = $request->input('categoryTitle');
        $status = $request->input('status');
        $rules = array ('categoryTitle' => 'required');
        $v = \Validator::make (Input::all (), $rules);
        if($v->fails()){
        Input::flash();
        return Redirect::back()->with('msg', 'All fields required');        
        }else{
        $dataSet = array(
        "categoryTitle" => $categoryTitle,
        "status" => $status,
        );
        if($categoryId){
        \DB::table('category')->where('categoryId', $categoryId)->update($dataSet);
        }else{
        $dataSet['at_time'] = date("Y-m-d H:i:s");       
        \DB::table('category')->insert($dataSet);
        }
        return redirect('/admin/ShowCategories');
        }
    }
    
    
 
}
?>