<?php const URL = "http://framework2025/student/"; ?>
<h1>Index</h1>
<h2>Liste des étudiants</h2>
<button onclick="window.location.href='<?= URL ?>insert/'">Ajouter un étudiant</button>
<?php if (!empty($data)): ?>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['nom'] ?></td>
                <td><?= $student['prenom'] ?></td>
                <td><?= $student['email'] ?></td>
                <td>
                    <a href="<?= URL ?>view/<?= $student['id'] ?>/<?= $student['nom'] ?>">Détails</a>
                    <form id="supprform" method="post" action="<?= URL ?>delete/<?= $student['id'] ?>" style="display:inline;">
                        <button type="submit" name="delete">Supprimer</button>
                    </form>
                    <a href="<?= URL ?>update/<?= $student['id'] ?>">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun étudiant trouvé.</p>
<?php endif; ?>