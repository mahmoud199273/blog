<?php
namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Models\Articles
};
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    

    public function index()
    {
        $obj = new Articles();
        $data['Articles'] = $obj->ListFrontArticles();
        return view('front.index',$data);
    }
    
    public function CategoryArticles($categoryId,$articles)
    {
        $obj = new Articles();
        $data['category'] = $obj->activeCategory($categoryId);
        $data['Articles'] = $obj->queryActiveCategory($categoryId);
        return view('front.category_articles',$data);
    }
    public function ShowArticle($articlesId,$articlesTitle){
    $obj = new Articles();    
    $data['comments'] = $obj->queryallArticleComment($articlesId);      
    $data['article'] = $obj->ActiveFrontArticle($articlesId);    
    return view('front.article',$data);
    }
    
    public function SaveComment(Request $request){
    
        $articlesId = $request->input('articlesId');
        $visitor_name = $request->input('visitor_name');
        $comment = $request->input('comment');
        $rules = array ('visitor_name' => 'required','comment' => 'required');
        $v = \Validator::make (Input::all (), $rules);
        
        if($v->fails()){
        return Redirect::back()->with('msg', 'All fields required');    
        }else{
        $dataSet = array(
        "articlesId" => $articlesId,
        "visitor_name" => $visitor_name,
        "comment" => $comment,
        "at_time" => date("Y-m-d H:i:s"),
        );
        \DB::table('comments')->insert($dataSet);
        return back();
        }
    }
    
}
?>