<!DOCTYPE html>
<html>
<h1>{{$ticket->title}}</h1>
<table>
    <style>
        body {font-family: Copperplate, Papyrus, fantasy; padding: 20px; text-align: center; background: #6b7280; color: #1f2937;}
        table {border-collapse: collapse; margin-top: 20px; width: 60%; height: 70%; margin-left: auto; margin-right: auto; background-color: #9ca3af; border: 1px solid #1f2937; color: #1f2937;}
        th, td {border: 1px solid #1f2937; padding: 10px; text-align: center; color: #1f2937;}
        th {background-color: #4b5563; color: white;} </style>
        <thead>
    <tr>
        <th>Status</th>
        <th>Priority</th>
        <th>Submitted By</th>
        <th>Full Description </th>
         </tr>
    <tbody>
    <tr>
        <td>{{$ticket->status}}</td>
        <td>{{$ticket->priority}}</td>
        <td>{{$ticket->creator->name}}</td>
        <td>{{$ticket->description}}</td>
    </tr>
    </tbody>
    </table>


<a href="/ViewTicket">← Back to Tickets</a>
</html>
