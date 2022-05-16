<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Commentary;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentaryController extends Controller
{

    public function store(Request $request)
    {
        $tickets = Ticket::select($request->id);

        Commentary::create([
            'commentary' => $request->get('commentary'),
            'ticket_id' => '1',
            'user_id' => Auth::id()
        ]);

        return redirect('tickets/show/', 'tickets');
    }
}
