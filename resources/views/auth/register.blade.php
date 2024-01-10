<form method="post">
    @csrf

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <button>S'inscrire</button>
</form>
