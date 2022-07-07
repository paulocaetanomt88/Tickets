<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Status</title>
</head>
<body>
<p>
    Olá {{ ucfirst($ticketOwner->name) }},
</p>
<p>
    Seu ticket de suporte com ID #{{ $ticket->ticket_id }} foi marcado como resolvido e fechado.
</p>
</body>
</html>
