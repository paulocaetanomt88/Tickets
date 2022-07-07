<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>j2A Ticket</title>
</head>
<body>
<p>
Olá {{ ucfirst($user->name) }}! Agradecemos por contatar nossa equipe de suporte. Um ticket foi aberto pra você. Você será contactado quando houver uma mensagem de resposta. Segue abaixo os detalhes do seu ticket:
</p>
<p>Título: {{ $ticket->title }}</p>
<p>Prioridade: {{ $ticket->priority }}</p>
<p>Status: {{ $ticket->status }}</p>
<p>
Você consegue consultar seu ticket a qualquer momento em {{ url('tickets/'. $ticket->ticket_id) }}
</p>
</body>
</html>
