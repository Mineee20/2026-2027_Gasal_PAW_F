<?php
require 'validate(4_3_1).inc';

$errors = array();
validateName($errors, $_POST, 'surname');

if ($errors) {
    echo 'Errors:<br/>';
    foreach ($errors as $field => $error) {
        echo "$field $error</br>";
    }
} else {
    echo 'Data OK!';
}
?>