<h1>Index</h1>


<?php

$requester = new Requester('http://framework2025/student/index');


$responseInsert = $requester->post('student', [
    'nom' => 'Dupont',
    'prenom' => 'Jean',
    'email' => 'jean.dupont@example.com'
]);
print_r($responseInsert);

/*
$responseDelete = $requester->delete('students', [
    'id' => 3
]);
print_r($responseDelete);*/


$responseGet = $requester->get('students', [
    'id' => 1
]);
print_r($responseGet);


if (!empty($data)) {
    var_dump($data);
}

?>