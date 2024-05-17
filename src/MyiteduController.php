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
        $records = FormData::select('uuid', DB::raw('MAX(id) as id'))
            ->groupBy('uuid')
            ->orderBy('uuid', 'desc')
            ->paginate(20);
        return view("emailservices::formdata", compact('records'));
    }
}
