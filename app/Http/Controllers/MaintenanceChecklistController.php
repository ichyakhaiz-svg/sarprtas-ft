<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceChecklist;

class MaintenanceChecklistController extends Controller
{
    public function index()
    {
        $checklist =
            MaintenanceChecklist::paginate(10);

        return view(
            'checklist.index',
            compact('checklist')
        );
    }

    public function create()
    {
        return view('checklist.create');
    }

    public function store(Request $request)
    {
        MaintenanceChecklist::create(
            $request->all()
        );

        return redirect()
            ->route('checklist-maintenance.index')
            ->with(
                'success',
                'Checklist berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $checklist =
            MaintenanceChecklist::findOrFail($id);

        return view(
            'checklist.edit',
            compact('checklist')
        );
    }

    public function update(Request $request, $id)
    {
        $checklist =
            MaintenanceChecklist::findOrFail($id);

        $checklist->update(
            $request->all()
        );

        return redirect()
            ->route('checklist-maintenance.index')
            ->with(
                'success',
                'Checklist berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        MaintenanceChecklist::destroy($id);

        return back()->with(
            'success',
            'Checklist berhasil dihapus'
        );
    }
}