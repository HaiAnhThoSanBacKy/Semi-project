<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User as MainModel;
use App\Models\StudentProfile;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $data['rows'] = MainModel::where('role', 'student')->get();
        return view('students.index', $data);
    }

    public function add()
    {
        $data['classes'] = Classroom::all();
        return view('students.form')->with($data);
    }

    public function create(Request $request)
    {
        try {
            $params = $request->all();
            $params['password'] = Hash::make($params['password']);
            $params['username'] = $params['code'];
            $params['role'] = 'student';
            DB::transaction(function () use ($params) {
                $params['profile_id'] = StudentProfile::create($params)->id;
                MainModel::create($params);
            });
            return redirect()->route('students')->withSuccess("add successful");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $data['classes'] = Classroom::all();
        $data['rec'] = MainModel::findOrFail($id);
        return view('students.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $rec = MainModel::findOrFail($id);
            $params = $request->all();
            if(strlen($params['password']))
                $params['password'] = Hash::make($params['password']);
            else
                unset($params['password']);
            $params['username'] = $params['code'];
            $params['role'] = 'student';
            DB::transaction(function () use ($params, $rec) {
                $rec->profile->update($params);
                $rec->update($params);
            });
            return redirect()->route('students')->withSuccess("up to date");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage())->withInput();
        }
    }

    public function delete($id) {
        try {
            $rec = MainModel::findOrFail($id);
            $rec->profile->delete();
            $rec->delete();
            return redirect()->back()->withSuccess("delete complte");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
