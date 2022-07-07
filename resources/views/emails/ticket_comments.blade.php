<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Suporte</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>
---
<p>Respondido por: {{ $user->name }}</p>
<p>Título: {{ $ticket->title }}</p>
<p>Ticket ID: {{ $ticket->ticket_id }}</p>
<p>Status: {{ $ticket->status }}</p>
<p>
    Você consegue consultar seu ticket a qualquer momento em {{ url('tickets/'. $ticket->ticket_id) }}
</p>
</body>
</html>
