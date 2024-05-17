<?php
namespace Myitedu\EmailServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyiteduController extends Controller
{
    public function testform(Request $request){
        return view("emailservices::testform");
    }
    public function formdata(Request $request){
        $records = FormData::groupBy('uuid')
            ->orderBy('uuid', 'desc')
            ->paginate(20);
        return view("emailservices::formdata", compact('records'));
    }
}
