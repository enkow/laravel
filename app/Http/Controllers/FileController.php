<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends BaseController
{
    protected $prefix = 'admin.file';

    public function index()
    {
        $path = storage_path('img/source');
        $files = collect(scandir($path, SCANDIR_SORT_DESCENDING));

        return $this->view('index', compact('files'));
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
        if (!$request->file) {
            return response()->json(['success' => false, 'message' => 'The file is missing'], 400);
        }

        $file = $request->file;
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
            return response()->json(['success' => false, 'message' => 'You can upload only images!'], 400);
        }

        if ($file->getSize() / 1000000 > 2) {
            return response()->json(['success' => false, 'message' => 'File is too big! Max filesize: 2MiB.'], 400);
        }

        $path = storage_path('img/source');

        do {
            $time = time();
            $name = sprintf("upload-%s.%s", $time, $file->extension());
        } while (file_exists($path . DIRECTORY_SEPARATOR . $name));

        if ($file->move($path, $name)) {
            return response()->json(['success' => true, 'name' => $name], 200);
        }

        return response()->json(['success' => false, 'message' => 'Unknown error occurred!'], 200);
    }

    public function delete($filename)
    {
        $name = $filename;
        if (preg_match('/upload-\d+\.[a-z]{3,4}/', $name)) {
            $path = storage_path('img/source');
            if (file_exists($path . DIRECTORY_SEPARATOR . $name)) {
                unlink($path . DIRECTORY_SEPARATOR . $name);
            }
        }

        return response()->json(['success' => true], 200);
    }
}
