<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class FrontEndController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_status', 1)->get();
        $books = Book::where('book_status',1)->get();
        return view('FrontEnd.content.home',compact('categories','books'));
    }
    
}
