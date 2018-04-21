<?php

class cliente {
    
    private $id = 0;
    private $nome = '';
    private $cpf = '';
    private $endereco = '';
    private $bairro = '';
    private $cep = '';
    private $cidade = '';
    private $estado = '';
    private $telefone = '';
    private $celular = '';
    private $dbh = '';
    
    function __construct(){
        $this->dbh = dataBase::getHandler();
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function getId(){
        return $this->id;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    
    function getNome(){
        return $this->nome;
    }
    
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    function getCpf(){
        return $this->cpf;
    }
    
    function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    function getEndereco(){
        return $this->endereco;
    }
    
    function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    function getBairro(){
        return $this->bairro;
    }
    
    function setCep($cep){
        $this->cep = $cep;
    }
    
    function getCep(){
        return $this->cep;
    }
    
    function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    function getCidade(){
        return $this->cidade;
    }
    
    function setEstado($estado){
        $this->estado = $estado;
    }
    
    function getEstado(){
        return $this->estado;
    }
    
    function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    function getTelefone(){
        return $this->telefone;
    }
    
    function setCelular($celular){
        $this->celular = $celular;
    }
    
    function getCelular(){
        return $this->celular;
    }
    
    function create(){
        $this->dbh->exec("INSERT INTO customers(nome,cpf,endereco,bairro,cep,cidade,estado,telefone,celular) VALUES ('$this->nome','$this->cpf','$this->endereco','$this->bairro','$this->cep','$this->cidade','$this->estado','$this->telefone','$this->celular')");
        $lastId = $this->dbh->lastInsertId();
        $this->read($lastId);
    }
    
    function read($id){
        $result = $this->dbh->query("SELECT * FROM customers WHERE id = $id");
        $usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->setId($usrArray[0]['id']);
        $this->setNome($usrArray[0]['nome']);
        $this->setCpf($usrArray[0]['cpf']);
        $this->setEndereco($usrArray[0]['endereco']);
        $this->setBairro($usrArray[0]['bairro']);
        $this->setCep($usrArray[0]['cep']);
        $this->setCidade($usrArray[0]['cidade']);
        $this->setEstado($usrArray[0]['estado']);
        $this->setTelefone($usrArray[0]['telefone']);
        $this->setCelular($usrArray[0]['celular']);
    }
    
    function update(){
        $this->dbh->exec("UPDATE customers SET nome='$this->nome',cpf='$this->cpf',endereco='$this->endereco',bairro='$this->bairro',cep='$this->cep',cidade='$this->cidade',estado='$this->estado',telefone='$this->telefone',celular='$this->celular' WHERE id = $this->id");
        $this->read($this->id);
    }
    
    function delete(){
        $this->dbh->exec("DELETE FROM customers WHERE id = $this->id");
        $this->id = 0; // Remover referência
    }
    static function getAll(){
        $dbh = dataBase::getHandler();
        $result = $dbh->query("SELECT * FROM customers ORDER BY id DESC");
        $chmArray = $result->fetchAll(PDO::FETCH_ASSOC);
        $x=0;
        foreach ($chmArray as $row) {
            $cliente = new cliente();
            $cliente->read($row['id']);
            $retorno[$x] = $cliente;
            $x++;
        }
        return $retorno;
    }
    
    static function search($keyword = ""){
        $dbh = dataBase::getHandler();
        $result = $dbh->query("SELECT id FROM clientes WHERE nome LIKE '%$keyword%' ORDER BY id DESC");
        
        $chmArray = $result->fetchAll(PDO::FETCH_ASSOC);
        $x=0;
        foreach ($chmArray as $row) {
            $cliente = new cliente();
            $cliente->read($row[id]);
            $retorno[$x] = $cliente;
            $x++;
        }
        return $retorno;
    }
}

?>