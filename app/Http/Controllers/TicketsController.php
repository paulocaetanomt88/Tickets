<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mailers\AppMailer;
use Illuminate\Contracts\Mail\Mailer;

class TicketsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);
        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(Str::random(10)),
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Aberto"
        ]);
        $ticket->save();
        $mailer->sendTicketInformation(Auth::user(), $ticket);
        return redirect()->back()->with("status", "Um ticket com ID: #$ticket->ticket_id foi aberto.");
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);

        return view('tickets.user_tickets', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::where('ticket_id', $id)->firstOrFail();
        return view('tickets.show', compact('ticket'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "Fechado";
        $ticket->save();
        $ticketOwner = $ticket->user;
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
        return redirect()->back()->with("status", "O ticket está fechado.");
    }
}
