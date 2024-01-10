

    <h1>Liste des Salles</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Salle</th>
                <th>Prix de la salle</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td> {{ $room['id'] }} </td>
                    <td> {{ $room['name'] }} </td>
                    <td> {{ $room['price'] }} </td>
                </tr>
                @endforeach
        </tbody>
    </table>
