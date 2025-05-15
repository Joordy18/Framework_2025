<h1>Ajouter un étudiant</h1>

<form method="post" action="/student/insert">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <button type="submit">Ajouter</button>
    <button onclick="window.location.href='http://framework2025/student/index'">Retour à la liste</button>
</form>