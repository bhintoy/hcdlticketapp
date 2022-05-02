<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use DataTables;

class UserController extends Controller
{
    // Muestra la vista con el listado de usuarios
    public function list()
    {
        $departments = Department::select('id', 'name')->get();
        return view('users.list', compact('departments'));
    }

    // Guarda los datos del formulario
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'rut' => 'required|unique:users,rut',
            'department_id' => 'required',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $request->get('name'),
            'rut' => $request->get('rut'),
            'department_id' => $request->get('department_id'),
            'password' => bcrypt($request->get('password'))
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function dataTable(Request $request)
    {
        $users = User::with('department')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($users)
            ->addColumn('actions', function ($user){
                return '
                    <button type="button" class="btn btn-sm btn-primary" data-id="'.$user->id.'"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-id="'.$user->id.'"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns([
                'actions'
            ])
            ->toJson();
    }
}
