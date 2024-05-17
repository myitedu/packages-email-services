<?php
namespace Myitedu\EmailServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyiteduController extends Controller
{
    public function testform(Request $request){
        return view("emailservices::testform");
    }
    public function formdata(Request $request){
        $records = FormData::orderBy('uuid', 'desc')
            ->paginate(100);

        return view("emailservices::formdata", compact('records'));
    }

}
