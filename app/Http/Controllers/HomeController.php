<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $dataPembayaran = Pembayaran::select('*')->where('nim', auth()->user()->nim)->orderBy('created_at', 'DESC')->first();
        $history = Pembayaran::select('*')->where('nim', auth()->user()->nim)->orderBy('created_at', 'DESC')->get();

        foreach($history as $data){
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('d F Y');
        }

        return view('dashboard', ['dataPembayaran' => $dataPembayaran, 'history' => $history]);
    }
}
