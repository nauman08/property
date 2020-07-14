<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Customer;
use App\userService;
use App\Service;
use Auth;

class UserController extends Controller
{
    public function index(){
        $services = array(); 
        $a = userService::where('user_id',Auth::user()->id)->get();
        foreach($a as $singleService)
        {
            $val=Service::where('id',$singleService['service_id'])->first();
            $services[] = $val['service_name'];
        }
       
         return view('dashboard')->with('service',$services);
    }


    public function assignedBooks(){
        $books = Customer::where('user_id',Auth::user()->id)->get();
        $inventory = Inventory::where('ref_id','!=',null)->get();
        return view('user.booksManage')->with('books',$books)->with('inventory',$inventory);
    }

    public function getBook(Request $req){
        $book = Customer::where('book_id',$req->book)->first();
        if($book != null) {
            return redirect()->back()->with('message', 'You already requested for the book');
        }

        $user = new Customer();
        $user->user_id = Auth::user()->id;
        $user->book_id = $req->book;
        $user->get_date = date('d-m-Y');
        $user->fine = 0;
        $user->save();

        return redirect()->back()->with('message','Successfully Applied For Book, Please wait For the approval');
    }

    public function deleteBook(Request $req){
        $book = Customer::where('id',$req->id)->delete();
        return redirect()->back()->with('message','Book Deleted Successfully');
    }

    public function expireBook(){
        $bookId = array();
        $myBooks = Customer::where('user_id',Auth::user()->id)->get();
        foreach($myBooks as $book) {
            if (strtotime($book->return_date) - strtotime(date('d-m-Y')) <= 0) {
                $bookId[] = $book->id;
            }
        }
        $books = Customer::whereIn('id', $bookId)->get();
        return view('user.booksExpire')->with('books',$books);
    }

    public function returnBook(Request $req){
        Customer::where('book_id',$req->id)->update([
            'user_return' => date('d-m-Y'),
        ]);
        return redirect()->back()->with('message','Book Returned Successfully');
    }
}
