<?php
require($_SERVER['DOCUMENT_ROOT'] . '/includes/validations.php');
require($_SERVER['DOCUMENT_ROOT'] . '/includes/field.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/database.php');

$salutation = new Field('salutation', $_POST['salutation']);
$firstname = new Field('firstname', $_POST['firstname']);
$lastname = new Field('lastname', $_POST['lastname']);
$email = new Field('email', $_POST['email']);
$haircolor = new Field('haircolor', $_POST['haircolor']);
$birthyear = new Field('birthyear', $_POST['birthyear']);
$password = new Field('password', $_POST['password']);
$message = new Field('message', $_POST['message']);
$allFields = array($salutation, $firstname, $lastname, $email, $haircolor, $birthyear, $password, $message);

$error = false;

if(!validateSalutation($salutation)) {
    $error = true;
}
if(!validateFirstname($firstname)) {
    $error = true;
}
if(!validateLastname($lastname)) {
    $error = true;
}
if(!validateEmail($email)) {
    $error = true;
}
if(!validateHaircolor($haircolor)) {
    $error = true;
}
if(!validateBirthyear($birthyear)) {
    $error = true;
}
if(!validatePassword($password)) {
    $error = true;
}
if(!validateMessage($message)) {
    $error = true;
}



if ($error) {
    
    $errorFields = array();

    foreach ($allFields as $key => $field) {
        if (!empty($field->errorMessages)) {

            $error = [
                'name' => $field->name,
                'messages' => $field->errorMessages
            ];
            array_push($errorFields, $error);
        }
    }    

    $response = [
        'success' => false,
        'errorFields' => $errorFields
    ];

    echo(json_encode($response));
    return;
}




if (saveUserDB($salutation->value, $firstname->value, $lastname->value, $email->value, $haircolor->value, $birthyear->value, hash('sha256', $password->value), $message->value) == true) {
    $response = [
        'success' => true,
        'message' => 'Daten erfolgreich gespeichert!'
    ];

} else {
    $response = [
        'success' => false,
        'message' => 'Daten konnte nicht gespeichert werden. Unbekannter fehler!',
    ];
}

echo(json_encode($response));