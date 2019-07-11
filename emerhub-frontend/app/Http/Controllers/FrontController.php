<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;
use Alert;

class FrontController extends Controller
{
    public function ConvertFile()
    {
        $client = new Client();
        $res = $client->request('GET', env('API_URL').'get-file');
        $get_data= json_decode($res->getBody()->getContents());
        $openFile = $get_data;

        return view('welcome', array(
            'datas' => $openFile->data->file_name
        ));
    }

    public function PostFile(Request $request)
    {
        $file_name = $request->file('file_name');

        $client = new Client();

        $res = $client->request('POST', env('API_URL').'upload-file', array(
            'multipart' => array(
                array(
                    'name'     => 'file_name',
                    'contents' => fopen($file_name->move(public_path('uploads'), $file_name->getClientOriginalName()), 'r'),
                    'filename' => $file_name->getClientOriginalName(),
                ),
            )
        ));

        $post_file = json_decode($res->getBody()->getContents());
        if ($post_file->code == 200) {
            return redirect('/');
        } else {
            return redirect('/d');
        }
    }

    public function ConvertJson()
    {
        $json = file_get_contents('./student_data.json');
    }
}
