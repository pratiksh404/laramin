<?php

namespace Pratiksh\Laramin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->isAuthorized()) {
            $activities = Activity::all();
            return view('laramin::admin.activity.index', compact('activities'));
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        if ($this->isAuthorized()) {
            $activity->delete();
            return redirect(adminRedirectRoute('activity'))->withFail('Activity Deleted !');
        } else {
            abort(403);
        }
    }

    private function isAuthorized(): bool
    {
        return Auth::user()->hasRole('admin') || Auth::user()->isSuperAdmin();
    }
}
