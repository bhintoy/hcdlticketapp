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
        $userExists = $request->get('user_id');

        $validateRut = 'required|cl_rut|unique:users,rut';
        $validatePassword = 'required|min:4';

        if($userExists) {
            $validateRut = 'required|cl_rut|unique:users,rut,' . $userExists;
            $validatePassword = 'nullable|min:4';
        }

        $this->validate($request, [
            'name' => 'required',
            'rut' => $validateRut,
            'department_id' => 'required',
            'password' => $validatePassword
        ]);

        if($userExists) {
            // update user
            $message = 'Usuario actualizado exitosamente';
            $user = User::find($userExists);

            $user->update([
                'name' => $request->get('name'),
                'rut' => $request->get('rut'),
                'department_id' => $request->get('department_id')
            ]);

            if($request->get('password')){
                $user->update([
                    'password' => bcrypt($request->get('password'))
                ]);
            }

        } else {
            // create user
            $message = 'Usuario creado exitosamente';

            User::create([
                'name' => $request->get('name'),
                'rut' => $request->get('rut'),
                'department_id' => $request->get('department_id'),
                'password' => bcrypt($request->get('password'))
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function show($id)
    {
        return User::find($id);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado exitosamente'
        ]);
    }

    public function dataTable(Request $request)
    {
        $users = User::with('department')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($users)
            ->addColumn('actions', function ($user){
                return '
                    <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="'.$user->id.'"><i class="fa fa-edit"></i> Editar</button>
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="'.$user->id.'"><i class="fa fa-trash"></i> Eliminar</button>
                ';
            })
            ->rawColumns([
                'actions'
            ])
            ->toJson();
    }
}
