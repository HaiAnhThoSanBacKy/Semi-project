<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom as MainModel;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index()
    {
        $data['rows'] = MainModel::all();
        return view('classes.index', $data);
    }

    public function add()
    {
        return view('classes.form');
    }

    public function view($id) {
        $data['rec'] = MainModel::findOrFail($id);
        return view('classes.student_list', $data);
    }

    public function create(Request $request)
    {
        try {
            $params = $request->all();
            DB::transaction(function () use ($params) {
                MainModel::create($params);
            });
            return redirect()->route('classes')->withSuccess("add successful");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $data['rec'] = MainModel::findOrFail($id);
        return view('classes.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            $params = $request->all();
            DB::transaction(function () use ($params, $rec) {
                $rec->update($params);
            });
            return redirect()->route('classes')->withSuccess("update successful");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            if($rec->students->count() > 0)
                throw new \Exception('you must remove all student after delete class');
            $rec->delete();
            return redirect()->back()->withSuccess("delete successful");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
