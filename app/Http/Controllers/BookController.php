<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    //-------------- insert to DB by API----------------------
    public function index(Request $req)
    {
        $book = Book::where('book_name', "!=" . $req->book_name)->get(); // check first
        if (sizeof($book)) {
            Book::create([
                'book_name' => $req->book_name,
                'author' => $req->author,
                'quantity' => $req->quantity
            ])->where('book_name', "!=" . $req->book_name);

            return response()->json([
                "msg" => "add to DB",
            ], 200);
        } else {
            return response()->json([
                "msg" => "this book in db already",
            ], 404);
        }
    }
    //--------------------------------------------------------



    //-------------- show all item in DB by API----------------------
    public function showAll()
    {
        return Book::all();
    }


    //-------------- show books by book name in DB by API----------------------

    public function showByName($book_name)
    {
        $book = Book::where('book_name', $book_name)->get(); // search in DB by name
        if (sizeof($book)) { //if found 
            return response()->json($book); // return json
        } else {

            return response()->json(["msg" => "not found"], 404);
        }
    }
}
