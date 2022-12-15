<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userType = Auth::user()->id;
        if($userType==1)
        {
            $countCate = DB::table('categories')->where('category_status', 1)->count();
            $countBook = DB::table('books')->where('book_status', 1)->count();
            $countUser = DB::table('users')->count();

            return view('BackEnd.home.index', compact('countCate', 'countBook', 'countUser'));
        } else 
        {
            $categories = Category::where('category_status', 1)->get();
            $books = Book::where('book_status', 1)->get();
            return view('FrontEnd.content.home', compact('categories', 'books'));
        }
    }
}
