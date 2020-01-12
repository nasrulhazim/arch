<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        if (is_null($id)) {
            $id = auth()->user()->id;
        }

        $supervisors = \App\Models\User::where('id', '!=', $id)->whereHas('roles', function ($query) {
            $query->where('name', 'Supervisor');
        })->get();

        $reviewers = \App\Models\User::where('id', '!=', $id)->whereHas('roles', function ($query) {
            $query->where('name', 'Reviewer');
        })->get();

        return view('profile.edit', compact('supervisors', 'reviewers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        $this->validate($request, [
            'supervisor_id' => 'required',
            'reviewer_id'   => 'required',
        ]);

        \App\Models\User::where('id', auth()->user()->id)->update([
            'supervisor_id' => $request->input('supervisor_id'),
            'reviewer_id'   => $request->input('reviewer_id'),
        ]);

        alert()->success(__('Supervisor & Reviewer updated.'));

        return redirect()->route('profile.edit');
    }
}
