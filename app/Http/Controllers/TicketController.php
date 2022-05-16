<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Department;
use App\Models\Status;
use App\models\Commentary;
use Illuminate\Support\Facades\Auth;
use DataTables;

class TicketController extends Controller
{

    public function list()
    {
        $departments = Department::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('tickets.overseers.list', compact('departments', 'users'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'department_id' => 'required',
        ]);

        $idUser = Auth::id();

        Ticket::create([
            'subject' => $request->get('subject'),
            'description' => $request->get('description'),
            'priority' => $request->get('priority'),
            'department_id' => $request->get('department_id'),
            'status_id' => '2',
            'user_id' => $idUser
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket creado exitosamente'
        ]);
    }


    public function show($id)
    {
        $ticket = Ticket::find($id);
        $statuses = Status::select('id', 'name')->get();
        $commentaries = Commentary::select('commentary', 'id', 'commentaries.ticket_id')->get();

        return view('tickets.overseers.viewTicket', compact('ticket', 'statuses', 'commentaries'));
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ticket eliminado exitosamente'
        ]);
    }

    public function dataTable(Request $request)
    {
        $tickets = Ticket::with('department', 'user', 'status', 'user.department')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($tickets)
            ->addColumn('actions', function ($ticket){
                return '
                    <a class="btn btn-primary" href="'.route('tickets.show', $ticket->id).'"><i class="fa fa-eye"></i> Mostrar</a>
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="'.$ticket->id.'"><i class="fa fa-trash"></i> Eliminar</button>
                ';
            })
            ->rawColumns([
                'actions'
            ])
            ->toJson();
    }
}
