<h1>Modifier un étudiant</h1>

<form method="post" action="/student/update/<?= $student['id'] ?>">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($student['nom']) ?>" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($student['prenom']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>

    <button type="submit">Modifier</button>
</form>