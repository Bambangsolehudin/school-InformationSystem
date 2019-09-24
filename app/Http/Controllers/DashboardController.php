<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;
class DashboardController extends Controller
{
    public function index()
    {
    	$count = Siswa::count();
    	$count1 = Guru::count();
      
    	return view('dashboard.index',['count'=> $count, 'count1'=> $count1]);
    }
}
