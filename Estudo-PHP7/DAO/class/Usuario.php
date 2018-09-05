<?php 

class Usuario{

    private $id_usuario;
    private $des_login;
    private $des_senha;
    private $dt_cadastro;

    public function getIdusuario() {
        return $this->id_usuario;
    }

    public function setIdusuario($value) {
        $this->id_usuario = $value;
    }

    public function getDesLogin() {
        return $this->des_login;
    }

    public function setDesLogin($value) {
        $this->des_login = $value;
    }

    public function getDesSenha() {
        return $this->des_senha;
    }

    public function setDesSenha($value) {
        $this->des_senha = $value;
    }

    public function getDtCadastro() {
        return $this->dt_cadastro;
    }

    public function setDtCadastro($value) {
        $this->dt_cadastro = $value;
    }

    public function loadById($id) {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM USUARIOS WHERE ID_USUARIO_USU = :ID", array(
            ":ID" => $id
        ));

        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }

    public static function getList(){

        $sql = new Sql();
        return $sql->select("SELECT * FROM USUARIOS ORCER BY ST_DESLOGIN_USU");
    }

    public static function search($login) {

        $sql = new Sql();

        return $sql->select("SELECT * FROM USUARIOS WHERE ST_DESLOGIN_USU LIKE ? ORDER BY ST_DESLOGIN_USU", array(
            ':SERACH' => "%".$login."%"
        ));
    }

    public function login($login, $senha) {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM USUARIOS WHERE ST_DESLOIN_USU = :LOGIN AND ST_DESSENHA_USU = :PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $senha
        ));

        if (count($result) > 0) {
            $this->setData($results[0]);
        } else {
            throw new Exception("Login e/ou senha inv�lidos");
        }
    }

    public function insert() {

        $sql = new Sql();
        $results = $sql->select("CALL SP_USUARIOS_INSERT(:LOGIN, :PASSWORD)", array(
            "LOGIN" => $this->getDesLogin(),
            "PASSWORD" => $this->getDesSenha()
        ));

        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }

    public function __construct($login = "", $password = "") {
        $this->setDesLogin($login);
        $this->setDesSenha($password);
    }

    public function setData($data) {
        $this->setIdusuario($data['ID_USUARIO_USU']);
        $this->setDesLogin($data['ST_DESLOGIN_USU']);
        $this->setDesSenha($data['ST_DESENHA_USU']);
        $this->setDtCadastro(new DateTime($data['DT_CADASTRO_USU']));
    }

    public function __toString(){
        return json_encode(array(
            "ID_USUARIO_USU" => $this->getIdusuario(),
            "ST_DESLOGIN_USU" => $this->getDesLogin(),
            "ST_DESENHA_USU" => $this->getDesSenha(),
            // "DT_CADASTRO_USU" => $this->getDtCadastro()->format('d/m/Y H:i:s')
        ));
    }
}

?>