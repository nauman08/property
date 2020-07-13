<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Customer;
use Mail;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function manageBooks(){
        $inventory = Inventory::where('ref_id','!=',null)->get();
        return view('admin.manageBooks')->with('inventory',$inventory);
    }

    public function newBook(Request $req){
        $isbnCheck = Inventory::where('ISBN',$req->isbn)->first();
        if($isbnCheck != null){
            return redirect()->back()->with('message','Book with this isbn is already in inventory');
        }
        $authorId = Inventory::where('attr_name',$req->author)->select('id')->first();
        if($authorId == null){
            $author = new Inventory();
            $author->attr_id = 1;
            $author->attr_name = $req->author;
            $author->ref_id = null;
            $author->isbn = null;
            $author->save();
            $id = $author->id;
        }else $id = $authorId['id'];

        $inventory = new Inventory();
        $inventory->attr_id = 2;
        $inventory->attr_name = $req->bookName;
        $inventory->ref_id = $id;
        $inventory->isbn = $req->isbn;
        $inventory->save();

        return redirect()->back()->with('message','Book Added Successfully');
    }

    public function deleteBook(Request $req){
        Inventory::where('id',$req->id)->delete();
        Customer::where('book_id',$req->id)->delete();
        return redirect()->back()->with('message','Inventory Removed Successfully');
    }

    public function bookRequest(Request $req){
        $books = Customer::where('approved',0)->get();
        return view('admin.borrowRequests')->with('books',$books);
    }

    public function bookReject(Request $req){
        Customer::where('id',$req->id)->delete();
        return redirect()->back()->with('message','Request Removed');
    }

    public function bookApprove(Request $req){
        Customer::where('book_id',$req->id)->update([
            'approved' => 1,
            'return_date' => date('d-m-Y' ,strtotime( '+30 days' )),
        ]);
        return redirect()->back()->with('message','Request Approved');
    }

    public function bookExpired(){
        $expireDate = array();
        $books = Customer::where('user_return',null)->get();
        foreach($books as $book){
            if (strtotime($book->return_date) - strtotime(date('d-m-Y')) <= 0) {
                $expireDate[] = $book->id;
            }
        }
        $books = Customer::whereIn('id', $expireDate)->get();
        return view('admin.expireRequests')->with('books',$books);
    }
}
