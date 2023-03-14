<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\Terauser;

class DropzoneController extends Controller
{
    private $fileIDList = [];

    private function checkNRecreateFolder(string $folderPath)
    {
        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
            Log::info('Pdfs folder deleted');
        }
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath);
            Log::info('Pdfs folder created');
        }
    }

    private function getUserListByIdList(array $userList) {
        $pdfUserList = Terauser::whereIn('id', $userList)->get();
        return $pdfUserList;
    }

    // To render html form upload
    public function index()
    {
        return view('dropzone.index');
    }

    // To upload file from client to server
    public function store(Request $request)
    {
        $this->checkNRecreateFolder(public_path('storage/pdfs'));
        $this->fileIDList = [];
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        array_push($this->fileIDList, substr($fileName, 0, 5));
        $file->move(public_path('storage/pdfs'), $fileName);
        return response()->json(['success' => $fileName]);
    }

    public function selectUser(Request $request)
    {
        $targetUsers = $this->getUserListByIdList($this->fileIDList);
        return view('msilSender.selectTargets', [

        ]);
    }

    public function flushPasswords() {
        $teraUsers = Terauser::all();

        foreach($teraUsers as $teraUser) {
            $teraUser['password'] = $this->generateRandomString(8); // 'Random' password
            $teraUser->update();
        }

        return redirect('/Upload/selectUser')->with('message', 'All password has been updated');
    }
}
