<?php

namespace App\Http\Controllers;

use App\Models\Terauser;
use Illuminate\Http\Request;

class TerauserController extends Controller
{
    function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Show all
    public function index()
    {
        return view('terausers.index', [
            'terausers' => Terauser::latest()->filter(request(['search']))->paginate(15)
        ]);
    }

    // Edit each
    public function edit(Terauser $terauser)
    {
        return view('terausers.edit', [
            'terauser' => $terauser
        ]);
    }

    // Return a user view
    public function create()
    {
        return view('terausers.create');
    }

    // Store the new terauser
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email']
        ]);

        $formFields['password'] = $this->generateRandomString(8); // 'Random' password

        Terauser::create($formFields);
        return redirect('/Users/index')->with('message', 'User has been created successfully');
    }

    // Update the edition
    public function update(Request $request, Terauser $terauser)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $terauser->update($formFields);
        return redirect('/Users/index')->with('message', 'Information has been edited');
    }

    // Flush all passwords
    public function flushPasswords() {
        $teraUsers = Terauser::all();

        foreach($teraUsers as $teraUser) {
            $teraUser['password'] = $this->generateRandomString(8); // 'Random' password
            $teraUser->update();
        }

        return redirect('/Users/index')->with('message', 'All password has been updated');
    }
}
