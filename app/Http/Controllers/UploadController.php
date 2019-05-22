<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

/*
 * Task - 2
 * */

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        if ($file->getMimeType() !== 'application/pdf') {
            return response('File type is not pdf', 422);
        }

        $name = $file->getClientOriginalName();
        $size = $file->getSize();

        if ($this->searchFromPdf($file, 'Proposal')) {
            Upload::query()->firstOrCreate(['name' => $name, 'size' => $size]);
            $file->move('uploads', $name);
            return 'File saved.';
        }
        return '"Proposal" not found in PDF file';
    }


    private function searchFromPdf($file, $keyword)
    {
        // check keyword exists on PDF file content
        return true;//or false
    }
}
