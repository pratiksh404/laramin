<?php

namespace Pratiksh\Laramin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     *
     * Returns Dashboard
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function dashboard()
    {
        return view('laramin::admin.dashboard.index');
    }
}
