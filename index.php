<?php

// Testando a conecxao com o Banco de Dados utilizando o Metodo Singleton e PDO

# Carrega as definicoes para conecxao
require_once 'definicoes.php';

# Carrega a classe Banco
require_once 'classes/Banco.class.php';

# Realiza a conecxao
$conecxao = Banco::instancia();