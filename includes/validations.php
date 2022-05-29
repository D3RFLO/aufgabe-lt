<?php



function validateMessage($message)
{
    if (empty($message->value)) {
        $message->addError('Das Feld darf nicht leer sein!');
        return false;
    } else {
        return true;
    }
}

function validatePassword($password)
{
    $hasError = false;

    if (empty($password)) {
        $password->addError('Das Feld darf nicht leer sein!');
        $hasError = true;
    }

    if (strlen($password->value) < 8) {
        $password->addError('Das Passwort muss mindestens 8 Zeichen lang sein!');
        $hasError = true;
    }

    if (!preg_match('/[A-Z]/', $password->value)) {
        $password->addError('Das Passwort muss mindestens einen Großbuchstaben enthalten!');
        $hasError = true;
    }

    if (!preg_match('/[a-z]/', $password->value)) {
        $password->addError('Das Passwort muss mindestens einen Kleinbuchstaben enthalten!');
        $hasError = true;
    }

    if (!preg_match('/[0-9]/', $password->value)) {
        $password->addError('Das Passwort muss mindestens eine Zahl enthalten!');
        $hasError = true;
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $password->value)) {
        $password->addError('Das Passwort muss mindestens ein Sonderzeichen enthalten!');
        $hasError = true;
    }

    return !$hasError;
}

function validateBirthyear($birthyear)
{
    $hasError = false;
    if (empty($birthyear->value)) {
        $birthyear->addError('Das Feld darf nicht leer sein!');
        $hasError = true;
    }

    if (!is_numeric($birthyear->value)) {
        $birthyear->addError('Bitte geben Sie ein gültiges Jahr ein!');
        $hasError = true;
    }
    return !$hasError;
}

function validateHairColor($haircolor)
{
    if (empty($haircolor->value)) {
        $haircolor->addError('Das Feld darf nicht leer sein!');
        return false;
    } else {
        return true;
    }
}

function validateEmail($email)
{
    $hasError = false;

    if (empty($email->value)) {
        $email->addError('Das Feld darf nicht leer sein!');
        $hasError = true;
    }

    if (!filter_var($email->value, FILTER_VALIDATE_EMAIL)) {
        $email->addError('Bitte geben Sie eine gültige E-Mail-Adresse an!');
        $hasError = true;
    }
    return !$hasError;
}


function validateLastname($lastname)
{
    if (empty($lastname)) {
        $lastname->addError('Das Feld darf nicht leer sein!');
        return false;
    } else {
        return true;
    }
}


function validateFirstname($firstname)
{
    if (empty($firstname->value)) {
        $firstname->addError('Das Feld darf nicht leer sein!');
        return false;
    }
    return true;
}

function validateSalutation($salutation)
{
    $error = false;

    if (empty($salutation->value)) {
        $salutation->addError('Das Feld darf nicht leer sein');
        $error = true;
    }

    if ($salutation->value != 'male' && $salutation->value != 'female' && $salutation->value != 'diverse') {
        $salutation->addError('Das Feld hat einen unbekannten Wert ' . $salutation->value);

        $error = true;
    }

    return !$error;
}
