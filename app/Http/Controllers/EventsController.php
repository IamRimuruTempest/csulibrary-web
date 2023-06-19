<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
     public function index() {
        return DB::connection('mysql')
            ->table('school_events')
            ->get();
    }

    public function getEventByID(Request $request) {
        return DB::connection('mysql')
            ->table('school_events')
            ->where('id', '=', $request->id)
            ->get();
    }
}
