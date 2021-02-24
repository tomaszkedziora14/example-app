<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display form for upload.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('upload_form.form');
    }

    /**
     * Upload file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        ]);

        $fileName = 'doc.'.$request->file->extension();

        $request->file->move(storage_path('Documents'), $fileName);

        return back()
            ->with('success','You have successfully file uplaod.')
            ->with('file',$fileName);
    }
}
