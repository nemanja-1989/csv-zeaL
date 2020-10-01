<table>
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Gender</th>
        <th>Date of birth</th>
    </tr>
    </thead>
    <tbody>
    @foreach($importUsers as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->date_of_birth }}</td>
        </tr>
    @endforeach
    </tbody>
</table>