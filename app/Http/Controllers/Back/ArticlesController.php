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


class ArticlesController extends Controller
{


    public function ShowArticles()
    {
    $obj = new Articles();
    $data['Articles'] = $obj->ListArticles();  
    return view('back.articles.table',$data);
    }
    
    public function AddArticle(){
    $obj = new Articles();
    $data['categories'] = $obj->ListCategories();    
    return view('back.articles.form',$data);
    }
    
    public function EditArticle($id){
    $obj = new Articles();
    $data['categories'] = $obj->ListCategories();     
    $data['article'] = $obj->activeArticle($id);    
    return view('back.articles.form',$data);
    }
    
    
    function DeleteArticle($id){
    
        \DB::table('articles')->where('articlesId',$id)->delete();    
        return redirect('/admin/ShowArticles');
        
    }
    
    function SaveArticle(Request $request){
    
        $articlesId = $request->input('articlesId');
        $categoryId = $request->input('categoryId');
        $articlesTitle = $request->input('articlesTitle');
        $articlesBody = $request->input('articlesBody');
        $status = $request->input('status');
        $rules = array ('categoryId' => 'required','articlesTitle' => 'required','articlesBody' => 'required');
        $v = \Validator::make (Input::all (), $rules);
        if($v->fails()){
        Input::flash();
        return Redirect::back()->with('msg', 'All fields required');        
        }else{
        $dataSet = array(
        "categoryId" => $categoryId,
        "articlesTitle" => $articlesTitle,
        "articlesBody" => $articlesBody,
        "status" => $status,
        "author" => "admin",
        );
        if($articlesId){
        $dataSet['last_modified'] = date("Y-m-d H:i:s");   
        \DB::table('articles')->where('articlesId', $articlesId)->update($dataSet);
        }else{
        $dataSet['created_at'] = date("Y-m-d H:i:s");       
        \DB::table('articles')->insert($dataSet);
        }
        return redirect('/admin/ShowArticles');
        }
    }
    
    
 
}
?>