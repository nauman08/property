<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    private $_apiBaseUrl = 'https://p8o5jdm7ae.execute-api.us-east-1.amazonaws.com/test';

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
        $Roletype= Auth::user()->role;

        if($Roletype == 1){
            return redirect('/admin/dashboard');
        }elseif($Roletype == 2){
            return redirect('/');
        }else {
            return redirect('/login');
        }
    }

    public function test(){
        $data_string = [

            "user"=> "info@mvsol.ca",
            "identifier"=> "list_of_areas_ui"
        ];

        $a = json_encode($data_string);
        // dd($a);

        $ch = curl_init($this->_apiBaseUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HEADER, $a);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($a)
        ));

        $responseCandidateJson= curl_exec($ch);
        
        $responseCandidate = json_decode($responseCandidateJson, true);

        dd( $responseCandidate);
    }

}
