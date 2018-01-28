<?php
namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Models\Articles,
};
use Illuminate\Http\Request;


class AdminController extends Controller
{


    public function index()
    {
     return view('back.index');
    }
    
}
?>