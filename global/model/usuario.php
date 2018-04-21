<?php

class usuario {
    
    private $id = 0;
    private $nome = '';
    private $usuario = '';
    private $senha = '';
    private $nivel = '';
    private $dbh = '';
    
    
    function __construct(){
        $this->dbh = dataBase::getHandler();
    }
    
    function setNome($nome){
        $this->nome = $nome;
    }
    
    function getNome(){
        return $this->nome;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function getId(){
        return $this->id;
    }
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    function getUsuario(){
        return $this->usuario;
    }
    
    function setSenha($senha){
        $this->senha = $senha;
    }
    
    function getSenha(){
        return $this->senha;
    }
    
    function setNivel($nivel){
        $this->nivel = $nivel;
    }
    
    function getNivel(){
        return $this->nivel;
    }
    
    function create(){
        $this->dbh->exec("INSERT INTO usuarios(nome,usuario,senha,nivel) VALUES ('$this->nome','$this->usuario','$this->senha','$this->nivel')");
        $lastId = $this->dbh->lastInsertId();
        $this->read($lastId);
    }
    
    function read($id){
        $result = $this->dbh->query("SELECT * FROM usuarios WHERE id = $id");
        $usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->setId($usrArray[0]['id']);
        $this->setNome($usrArray[0]['nome']);
        $this->setUsuario($usrArray[0]['usuario']);
        $this->setSenha($usrArray[0]['senha']);
        $this->setNivel($usrArray[0]['nivel']);
    }
    
    function update(){
        $this->dbh->exec("UPDATE usuarios SET nome='$this->nome',usuario='$this->usuario',senha='$this->senha',nivel='$this->nivel' WHERE id = $this->id");
        $this->read($this->id);
    }
    
    function delete(){
        $this->dbh->exec("DELETE FROM usuarios WHERE id = $this->id");
        $this->id = 0; // Remover referência
    }
    
    static function getAll(){
        $dbh = dataBase::getHandler();
        $result = $dbh->query("SELECT * FROM usuarios");
        $usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
        $x=0;
        foreach ($usrArray as $row) {
            $usuario = new usuario();
            $usuario->read($row[id]);
            $retorno[$x] = $usuario;
            $x++;
        }
        return $retorno;
    }
    
    static function search($keyword = ""){
        $dbh = dataBase::getHandler();
        $result = $dbh->query("SELECT id FROM usuarios WHERE login LIKE '%$keyword%' LIMIT 1");
        if ($result->num_rows > 0) {
            $found = $result->fetchAll(PDO::FETCH_ASSOC);
            $usuario = new usuario();
            $usuario->read($found[id]);
            $retorno = $usuario;
        }
        return $retorno;
    }
}
?>