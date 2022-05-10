<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use DataTables;

class DepartmentController extends Controller
{
    public function list()
    {
        return view('departments.list');
    }

    public function save(Request $request)
    {
        $departmentExists = $request->get('department_id');

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($departmentExists) {
            // update department
            $message = 'Departamento actualizado exitosamente';
            $department = Department::find($departmentExists);

            $department->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
        } else {
            // create department
            $message = 'Departamento creado exitosamente';

            Department::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => $message
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
        return Department::find($id);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'Departamento eliminado exitosamente'
        ]);
    }

    public function dataTable(Request $request)
    {
        $departments = Department::orderBy('id', 'DESC')
            ->get();

        return DataTables::of($departments)
            ->addColumn('actions', function ($department){
                return '
                    <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="'.$department->id.'"><i class="fa fa-edit"></i> Editar</button>
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="'.$department->id.'"><i class="fa fa-trash"></i> Eliminar</button>
                ';
            })
            ->rawColumns([
                'actions'
            ])
            ->toJson();
    }

}
