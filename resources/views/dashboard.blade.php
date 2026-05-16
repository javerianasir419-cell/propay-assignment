<!DOCTYPE html>
<html>
<head>
    <title>MANAGE RECORDS - ProPay</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; padding: 40px; background: #ffffff; color: #000000; margin: 0; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; min-height: 80vh; display: flex; flex-direction: column; justify-content: space-between; }
        h2 { font-size: 24px; font-weight: normal; text-transform: uppercase; letter-spacing: 2px; border-bottom: 2px solid #000000; padding-bottom: 12px; margin: 0; }
        .header-actions { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 50px; }
        .btn { display: inline-block; padding: 12px 24px; text-transform: uppercase; letter-spacing: 1px; font-size: 13px; text-decoration: none; border: none; cursor: pointer; font-family: 'Times New Roman', Times, serif; }
        .btn-add { background: #2c2c2c; color: white; margin-right: 10px; }
        .btn-logout { background: #ffffff; color: #000000; border: 1px solid #000000; }
        .table-wrapper { flex-grow: 1; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-family: Arial, sans-serif; font-size: 13px; }
        th, td { padding: 12px 10px; text-align: left; border-bottom: 1px solid #e0e0e0; }
        th { font-family: 'Times New Roman', Times, serif; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; border-bottom: 2px solid #000000; font-size: 13px; color: #000000; }
        .actions-links a { text-decoration: none; font-family: 'Times New Roman', Times, serif; text-transform: uppercase; font-size: 11px; letter-spacing: 1px; margin-right: 10px; }
        .link-edit { color: #000000; font-weight: bold; }
        .link-delete { color: #8b0000; }
        .welcome-text { font-size: 14px; text-align: center; font-style: italic; color: #555555; margin-top: 60px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-actions">
            <h2>Manage Records</h2>
            <div>
                <a href="/create" class="btn btn-add">Capture New Person</a>
                <a href="/logout" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>SA ID Number</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Birth Date</th>
                        <th>Language</th>
                        <th>Interests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($people as $person)
                        <tr>
                            <td style="font-family: monospace;">{{ sprintf('%02d', $person->id) }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->surname }}</td>
                            <td style="font-family: monospace;">{{ $person->sa_id_number }}</td>
                            <td>{{ $person->mobile_number }}</td>
                            <td style="color: #444;">{{ $person->email }}</td>
                            <td>{{ $person->birth_date }}</td>
                            <td>{{ $person->language }}</td>
                            <td>{{ $person->interests }}</td>
                            <td class="actions-links">
                                <a href="/person/edit/{{ $person->id }}" class="link-edit">Edit</a>
                                <a href="/person/delete/{{ $person->id }}" class="link-delete" onclick="return confirm('Are you sure?')">Cancel</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" style="text-align: center; color: #888; font-style: italic; padding: 40px;">No records found in the engine database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="welcome-text">Logged in as: <strong>{{ session('user') }}</strong></p>
    </div>
</body>
</html>