<?php


namespace App\Http\Controllers;
use illuminate\http\Request;


class seriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'La casa de papel',
            'Mr robot',
            'Lost'
        ];

        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');

    }

}
