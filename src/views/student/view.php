<?php const URL = "http://framework2025/student/"; ?>
<div class="container">
    <h1>Détails de l'étudiant</h1>

    <?php if (!empty($student)): ?>
        <p><strong>ID :</strong> <?= $student['id'] ?></p>
        <p><strong>Nom :</strong> <?= $student['nom'] ?></p>
        <p><strong>Prénom :</strong> <?= $student['prenom'] ?></p>
        <p><strong>Email :</strong> <?= $student['email'] ?></p>
    <?php else: ?>
        <p>Étudiant introuvable.</p>
    <?php endif; ?>
    <button onclick="window.location.href='<?= URL ?>index'">Retour à la liste</button>
</div>