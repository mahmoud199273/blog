<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    
    protected $table = 'articles';
    
    
    public function ActiveFrontArticle($articlesId)
    {
        return Articles::select('articlesId', 'articlesTitle','author','articlesBody','created_at','last_modified','articles.status','categoryTitle')
        ->join('category','category.categoryId','=','articles.categoryId')    
        ->where('articles.articlesId','=',$articlesId)    
         ->first();
    }
    
    
    
    public function queryActiveCategory($categoryId)
    {
        return Articles::select('articlesId', 'articlesTitle','author','articlesBody','created_at','last_modified','articles.status','categoryTitle')
        ->join('category','category.categoryId','=','articles.categoryId')    
        ->where('category.categoryId','=',$categoryId)    
         ->orderBy('articlesId','DESC')->get()->toArray();
    }
    public function ListFrontArticles()
    {
        return Articles::select('articlesId', 'articlesTitle','author','articlesBody','created_at','last_modified','articles.status','categoryTitle')
        ->join('category','category.categoryId','=','articles.categoryId')->where('articles.status','=','1')    
         ->orderBy('articlesId','DESC')->get()->toArray();
    }
    public function ListArticles()
    {
        return Articles::select('articlesId', 'articlesTitle','created_at','articles.status','categoryTitle')
        ->join('category','category.categoryId','=','articles.categoryId')    
         ->orderBy('articlesId','DESC')->get()->toArray();
    }
    
    public function ListCategories()
    {
        return \DB::table('category')->where('status','=','1')
         ->select('*')
         ->orderBy('categoryId','DESC')->get()->toArray();
    }
    
    public function ListAllCategories()
    {
        return \DB::table('category')->select('*')
         ->orderBy('categoryId','DESC')->get()->toArray();
    }
    public function activeArticle($id)
    {
        return Articles::where('articlesId','=',$id)
         ->select('*')
         ->first();
    }
    public function activeCategory($id)
    {
        return  \DB::table('category')->where('categoryId','=',$id)
         ->select('*')
         ->first();
    }

    public function queryallArticleComment($articlesId)
    {
        return \DB::table('comments')->select('*')
        ->where('comments.articlesId','=',$articlesId)    
        ->orderBy('commentsId','DESC')->get()->toArray();
    }
    
    
}
