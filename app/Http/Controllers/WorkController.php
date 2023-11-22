<?php

namespace App\Http\Controllers;

use App\Models\work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if($request->input('search')) {
        $search = $request->input('search');
        $works = Work::query()
            ->where('name_work', 'LIKE', "%{$search}%")
            ->orWhere('type_work', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->get();
    } else if($request->input('date_start') && $request->input('date_end')) {
        $start = $request->input('date_start');
        $end = $request->input('date_end');
        $works = Work::query()
            ->whereBetween('time_start', [$start, $end])
            ->orWhereBetween('time_end', [$start, $end])
            ->get();
    } else {
        $works = Work::all();
    }

    return view('works.index', compact('works'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        work::create($request->all());
        return redirect()->route('works.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(work $work)
    {
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(work $work)
    {
        return view('works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, work $work)
    {
        $work->update($request->all());
        return redirect()->route('works.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(work $work)
    {
        $work->delete();
        return redirect()->route('works.index');
    }

    public function search(Request $request)
    {
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $works = work::where('time_start','>=',$date_start)->where('time_start','<=',$date_end)->get();
        return view("works.search",compact('works'));
    }
}
