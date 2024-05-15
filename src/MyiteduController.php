<?php
namespace Myitedu\EmailServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyiteduController extends Controller
{
    public function testform(Request $request){
        return view("emailservices::testform");
    }
}
