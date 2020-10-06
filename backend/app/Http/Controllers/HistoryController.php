<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{

    public function history(History $history)
    {
        $data = $history->showHistory();
        return view('history.history', $data);
    }

    public function detail($cart_version, History $history)
    {
        $data = $history->showDetail($cart_version);
        return view('history.detail', $data);
    }
}
