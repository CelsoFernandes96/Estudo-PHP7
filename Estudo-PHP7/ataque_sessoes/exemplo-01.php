<?php

session_start();

# Despois de verificar login e senha renicie o ID da sessão
session_destroy();

session_start();
session_regenerate_id();

echo session_id();

?>