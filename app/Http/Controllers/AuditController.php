<?php

namespace App\Http\Controllers;

use App\Models\Audit;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:see-all-audit|see-one-audit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Audit $audit
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        return view('audit.show', compact('audit'));
    }
}
