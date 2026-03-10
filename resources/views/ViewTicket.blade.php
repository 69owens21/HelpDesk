<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {font-family: Copperplate, Papyrus, fantasy; padding: 20px; text-align: center; background: #6b7280;color: #1f2937;}
        table {border-collapse: collapse; margin-top: 20px; width: 50%; margin-left: auto; margin-right: auto; background: #9ca3af; border: 1px solid #1f2937; color: #1f2937;}
        th, td {border: 1px solid #1f2937; padding: 5px; text-align: center; color: #1f2937;}
        th {background-color: #9ca3af; color: #1f2937;}
        .status-closed{}
        .status-open{}
        .status-in_progress{}
        .status-solved{}
        .priority-low{}
        .priority-medium{}
        .priority-high{}
        .priority-emergency{}





    </style>
    <h1>GDAWG'S HELPDESK</h1>
</head>

<body>

<h2>Ticket Viewer</h2>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Status</th>
        <th>User</th>
        <th>Technician</th>
    </tr>
    </thead>

    <tbody>
        @foreach($tickets as $info)
            <tr>
                <td>{{$info->title}}</td>
                <td>{{$info->description}}</td>
                <td>{{$info->user_id}}</td>
                <td>{{$info->assigned_to}}</td>
                <td>
                    @if($info->priority == 'Low')
                        <span class="priority-low">{{$info->priority}}</span>
                    @elseif($info->priority == 'Medium')
                        <span class="priority-medium">{{$info->priority}}</span>
                    @elseif($info->priority == 'High')
                        <span class="priority-high">{{$info->priority}}</span>
                    @elseif($info->priority == 'Emergency')
                        <span class="priority-emergency">{{$info->priority}}</span>
                        @endif
                </td>

                <td>
                    @if($info->status == 'Open')
                        <span class="status-open">{{$info->status}}</span>
                    @elseif($info->status == 'In Progress')
                        <span class="status-in_progress">{{$info->status}}</span>
                    @elseif($info->status == 'Resolved')
                        <span class="status-resolved">{{$info->status}}</span>
                    @elseif($info->status == 'Closed')
                        <span class="status-closed">{{$info->status}}</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
</body>
</html>
