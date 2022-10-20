<?php

	function validarEmail($mail){
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        return !filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

?>    