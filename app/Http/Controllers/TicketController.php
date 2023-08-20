<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{

    // Index method which returns tickets in layout
    public function index()
    {
        return view('tickets.index', [
            'tickets' => Ticket::all()
        ]);
    }

    // show method
    public function show($id)
    {
        return Ticket::find($id);
    }

    // store method
    public function store(Request $request)
    {
        return Ticket::create($request->all());
    }

    // update method
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        return $ticket;
    }

    // delete method
    public function delete(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return 204;
    }

    // smsWebhook method
    public function smsWebhook(Request $request)
    {

        $body = $request->Text;

        // Allow for multiple different delimiters
        $body = str_replace("\n", '$', $body);
        $parts = explode('$', $body);

        if (count($parts) < 2) {
            $ticket = Ticket::create([
                'body' => $body,
                'status' => 'issue',
                'from' => $request->From,
                'everything' => $request->all()
            ]);
        } else {
            $ticket = Ticket::create([
                'name' => isset($parts[0]) ? trim($parts[0]) : '',
                'phone' => isset($parts[1]) ? trim($parts[1]) : '',
                'address' => isset($parts[2]) ? trim($parts[2]) : '',
                'condition' => isset($parts[3]) ? trim($parts[3]) : '',
                'description' => isset($parts[4]) ? trim($parts[4]) : '',
                'body' => $body,
                'status' => 'new',
                'from' => $request->From,
                'everything' => $request->all()
            ]);
        }
    }
}
