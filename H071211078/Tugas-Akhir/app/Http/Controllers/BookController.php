<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_status', 1)->get();
        return view('BackEnd.book.addBook', compact('categories'));

    }

    public function save(Request $request)
    {
        $imgName = $request->file('book_cover');
        $image = $imgName->getClientOriginalName();
        $directory = 'BackEndSourceFile/book_img/';
        $imgUrl = $directory.$image;
        $imgName->move($directory,$image);

        $book = new Book();
        $book->book_name = $request->book_name;
        $book->category_id = $request->category_id;
        $book->book_cover = $imgUrl;
        $book->book_synopsis = $request->book_synopsis;
        $book->released_on = $request->released_on;
        $book->book_status = $request->book_status;

        $book->save();

        return back()->with('sms', 'Book saved');
    }

    public function manage()
    {
        // $books = Book::all();

        $books = DB::table('books')
        ->select('books.*','categories.category_name')
        ->join('categories','books.category_id','=','categories.category_id')
        ->get();

        $categories = Category::where('category_status', 1)->get();

        return view('BackEnd.book.manageBook',compact('books','categories'));
    }

    public function delete($book_id)
    {
        $book = Book::find($book_id);
        $book->delete();

        return back();
    }

    public function update(Request $request)
    {
        $book = Book::find($request->book_id);
        $img_main = $request->file('book_cover');
        
        if($img_main)
        {
            $img_name = $img_main->getClientOriginalName();
            $directory = 'BackEndSourceFile/book_img/';
            $imgUrl = $directory . $img_name;
            $img_main->move($directory, $img_name);

            $old_img = $book->book_cover;

            if(file_exists($old_img))
            {
                unlink($old_img);
            }
            
            $book->book_name = $request->book_name;
            $book->category_id = $request->category_id;
            $book->book_cover = $imgUrl;
            $book->book_synopsis = $request->book_synopsis;
            $book->released_on = $request->released_on;
            $book->book_status = $request->book_status;
        }
        else
        {
            $book->book_name = $request->book_name;
            $book->category_id = $request->category_id;
            $book->book_synopsis = $request->book_synopsis;
            $book->released_on = $request->released_on;
            $book->book_status = $request->book_status;
        }
        $book->save();
        
        return back()->with('sms','Book Updated Successfully');
    }

    public function active($book_id)
    {
        $book = Book::find($book_id);
        $book->book_status = 1;
        $book->save();

        return back();
    }
    public function Inactive($book_id)
    {
        $book = Book::find($book_id);
        $book->book_status = 0;
        $book->save();

        return back();
    }
}