<?php

namespace App\Http\Controllers;

use App\Models\Terauser;
use Illuminate\Http\Request;

class TerauserController extends Controller
{
    // Show all
    public function index() {
        return view('terausers.index', [
            'terausers' => Terauser::latest()->filter(request(['search']))->paginate(15)
        ]);
    }
}
