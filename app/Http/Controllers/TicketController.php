<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    // smsWebhook method
    public function smsWebhook(Request $request)
    {

        $body = $request->Text;

        $parts = explode(',', $body);

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
