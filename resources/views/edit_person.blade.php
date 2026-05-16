<!DOCTYPE html>
<html>
<head>
    <title>EDIT RECORD - ProPay</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; padding: 40px 0; display: flex; justify-content: center; align-items: center; background-color: #ffffff; margin: 0; }
        .form-box { background: white; padding: 40px; width: 500px; }
        h2 { font-size: 22px; font-weight: normal; text-transform: uppercase; letter-spacing: 2px; border-bottom: 2px solid #000000; padding-bottom: 12px; margin-bottom: 30px; text-align: left; }
        label { display: block; margin-top: 15px; font-size: 13px; color: #333333; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; }
        input, select { display: block; width: 100%; padding: 12px; box-sizing: border-box; border: 1px solid #cccccc; background-color: #f0f4f8; font-family: Arial, sans-serif; font-size: 14px; color: #000000; border-radius: 2px; }
        input:focus, select:focus { outline: none; border-color: #000000; background-color: #e3edf7; }
        select[multiple] { height: 90px; padding: 5px; }
        .btn-submit { width: 100%; padding: 14px; background: #2c2c2c; color: white; border: none; cursor: pointer; font-family: 'Times New Roman', Times, serif; text-transform: uppercase; letter-spacing: 2px; font-size: 14px; margin-top: 30px; }
        .btn-submit:hover { background: #000000; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #555555; text-decoration: none; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Record Details</h2>

        <form action="/person/update/{{ $person->id }}" method="POST">
            @csrf
            
            <label>First Name</label>
            <input type="text" name="name" value="{{ $person->name }}" required>

            <label>Surname</label>
            <input type="text" name="surname" value="{{ $person->surname }}" required>

            <label>South African ID Number</label>
            <input type="text" name="sa_id_number" maxlength="13" value="{{ $person->sa_id_number }}" required>

            <label>Mobile Number</label>
            <input type="text" name="mobile_number" value="{{ $person->mobile_number }}" required>

            <label>Email Address</label>
            <input type="email" name="email" value="{{ $person->email }}" required>

            <label>Birth Date</label>
            <input type="date" name="birth_date" value="{{ $person->birth_date }}" required>

            <label>Language (Single Selection)</label>
            <select name="language" required>
                <option value="English" {{ $person->language == 'English' ? 'selected' : '' }}>English</option>
                <option value="Afrikaans" {{ $person->language == 'Afrikaans' ? 'selected' : '' }}>Afrikaans</option>
                <option value="Zulu" {{ $person->language == 'Zulu' ? 'selected' : '' }}>Zulu</option>
                <option value="Xhosa" {{ $person->language == 'Xhosa' ? 'selected' : '' }}>Xhosa</option>
            </select>

            <label>Interests (Multiple Selection)</label>
            <select name="interests[]" multiple required>
                @php $assigned = explode(', ', $person->interests); @endphp
                <option value="Web Development" {{ in_array('Web Development', $assigned) ? 'selected' : '' }}>Web Development</option>
                <option value="Laravel Framework" {{ in_array('Laravel Framework', $assigned) ? 'selected' : '' }}>Laravel Framework</option>
                <option value="Systems Administration" {{ in_array('Systems Administration', $assigned) ? 'selected' : '' }}>Systems Administration</option>
                <option value="Database Design" {{ in_array('Database Design', $assigned) ? 'selected' : '' }}>Database Design</option>
            </select>

            <button type="submit" class="btn-submit">Update Details</button>
        </form>

        <a href="/dashboard" class="back-link">← Return to Dashboard</a>
    </div>
</body>
</html>