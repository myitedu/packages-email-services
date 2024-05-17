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
        // Subquery to get the max id for each uuid group
        $subquery = FormData::select(DB::raw('MAX(id) as id'))
            ->groupBy('uuid');

        // Join the subquery to get the full records
        $records = FormData::select('form_data.*')
            ->joinSub($subquery, 'sub', function ($join) {
                $join->on('form_data.id', '=', 'sub.id');
            })
            ->orderBy('uuid', 'desc')
            ->paginate(20);

        return view("emailservices::formdata", compact('records'));
    }
}
