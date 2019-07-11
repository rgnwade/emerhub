<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use \Illuminate\Container\Container as Container;
// use \Illuminate\Support\Facades\Facade as Facade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use DateTime;
use App\Model\DataUpload;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class ApiController extends Controller
{
    public function UploadFile(Request $request)
    {
        if ($request->file('file_name')) {
            $file = $request->file('file_name')->getClientOriginalName();
            $date = new DateTime();
            $d = Carbon::now() . $file;
            $destinationPath ="../public/upload";
            $request->file('file_name')->move($destinationPath, $d);
        } else {
            $d = '';
        }


        $post_file = DataUpload::create(array(
            'file_name'    => $d,
        ));

        if ($post_file) {
            return response()->json(array(
                'code' => 200,
                'type' => 'success',
                'status' => 'SUCCESS',
                'data' => $post_file,
                'message' => 'Success to upload file.'
            ), 200);
        } else {
            return response()->json(array(
                'code' => 404,
                'type' => 'not_found',
                'status' => 'FAILED',
                'message' => 'The requested object was not found.'
            ), 404);
        }
    }

    public function GetFile()
    {
        $get_file = DataUpload::latest()->first();

        if ($get_file) {
            return response()->json(array(
                'code' => 200,
                'type' => 'success',
                'status' => 'SUCCESS',
                'data' => $get_file,
                'message' => 'Success to get File.'
            ), 200);
        } else {
            return response()->json(array(
                'code' => 404,
                'type' => 'not_found',
                'status' => 'FAILED',
                'message' => 'The requested object was not found.'
            ), 404);
        }
    }
}
