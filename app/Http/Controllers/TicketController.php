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
                'body' => $body
            ]);
        } else {
            $ticket = Ticket::create([
                'name' => isset($parts[0]) ? $parts[0] : '',
                'phone' => isset($parts[1]) ? $parts[1] : '',
                'address' => isset($parts[2]) ? $parts[2] : '',
                'condition' => isset($parts[3]) ? $parts[3] : '',
                'description' => isset($parts[4]) ? $parts[4] : '',
                'body' => $body
            ]);
        }
    }
}
