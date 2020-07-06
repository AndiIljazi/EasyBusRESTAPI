<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;


class AgencyController extends Controller
{

    /**
     * API RESPONSE
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $agencies = Agency::whereHas('schedule', $filter = function ($query) use ($request) {

            if ($request->has('start_location')) {
                $query->where('start_location', $request->start_location);
            }

            if ($request->has('end_location')) {
                $query->where('end_location', $request->end_location);
            }

        })->with(['schedule' => $filter])->get();

        return response()->json($agencies->toArray());
    }


    /**
     * API RESPONSE
     *
     * @param Agency $agency
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Agency $agency)
    {
        return response()->json($agency->with('schedule')->get()->toArray());
    }

}
