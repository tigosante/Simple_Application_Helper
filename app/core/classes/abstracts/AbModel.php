<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/conexao/conexao.php");

abstract class AbModel
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    public function buscar($comando)
    {
        $comando = $this->pdo->prepare("SELECT * FROM `teste` ");

        if ($comando->execute()) {
            return $comando->fetchAll()[0]["nome"];
        }

        return $comando->errorInfo();
    }
}
