<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
    <style>
        body {font-family: Copperplate, Papyrus, fantasy; padding: 20px; text-align: center; background: #6b7280; color: #1f2937;}
        table {border-collapse: collapse; margin-top: 20px; width: 80%; margin-left: auto; margin-right: auto; background: #9ca3af; border: 1px solid #1f2937; color: #1f2937;}
        th, td {border: 1px solid #1f2937; padding: 10px; text-align: center; color: #1f2937;}
        th {background-color: #4b5563; color: white;} /* Made header a bit darker for contrast */
        .status-closed{color: #374151;} /* Darker gray for closed */
        .status-open{color: #fbcfe8; font-weight: bold;} /* Pink */
        .status-in_progress{color: #fb923c;} /* Orange */
        .status-resolved{color: #22c55e;} /* Green */
        .btn-primary {
            background-color: #1f2937;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            transition: all 0.2s ease-in-out; /* Makes the hover effect smooth */
        }
        .btn-primary:hover {
            background-color: #4b5563;
            transform: translateY(-2px); /* Makes the button "lift" up when hovered */
            box-shadow: 0 6px 8px rgba(0,0,0,0.4);
        }
        .priority-low{color: #22c55e;}
        .priority-medium{color: #fb923c;}
        .priority-high{color: #ef4444;}
        .priority-emergency{color: #1e3a8a; font-weight: bold;}

        .btn-primary {background: #1f2937; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px;}
        .btn-primary:hover {background: #374151;}
    </style>
</head>

<body>
<h1>GDAWG'S HELPDESK</h1>
<h2>Ticket Viewer</h2>

<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Submitter ID</th>
        <th>Assigned ID</th>
        <th>Action</th> </tr>
    </thead>

    <tbody>
    @foreach($tickets as $info)
        <tr>
            <td>{{ $info->title }}</td>

            <td>{{ \Illuminate\Support\Str::limit($info->description, 40) }}</td>

            <td>
                @if(strtolower($info->priority) == 'low')
                    <span class="priority-low">LOW</span>
                @elseif(strtolower($info->priority) == 'medium')
                    <span class="priority-medium">MEDIUM</span>
                @elseif(strtolower($info->priority) == 'high')
                    <span class="priority-high">HIGH</span>
                @elseif(strtolower($info->priority) == 'emergency')
                    <span class="priority-emergency">EMERGENCY</span>
                @endif
            </td>

            <td>
                @if(strtolower($info->status) == 'open')
                    <span class="status-open">OPEN</span>
                @elseif(strtolower($info->status) == 'in progress')
                    <span class="status-in_progress">IN PROGRESS</span>
                @elseif(strtolower($info->status) == 'resolved')
                    <span class="status-resolved">RESOLVED</span>
                @elseif(strtolower($info->status) == 'closed')
                    <span class="status-closed">CLOSED</span>
                @endif
            </td>

            <td>{{ $info->user_id }}</td>
            <td>{{ $info->assigned_to ?? 'Unassigned' }}</td>

            <td>
                <a href="/ticket/{{ $info->id }}" class="btn-primary">
                    View Details
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
