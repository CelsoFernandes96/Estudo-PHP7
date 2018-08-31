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

            $row = $result[0];

            $this->setIdusuario($row['ID_USUARIO_USU']);
            $this->setDesLogin($row['ST_DESLOGIN_USU']);
            $this->setDesSenha($row['ST_DESENHA_USU']);
            $this->setDtCadastro(new DateTime($row['DT_CADASTRO_USU']));
        }
    }

    public function __toString(){
        return json_encode(array(
            "ID_USUARIO_USU" => $this->getIdusuario(),
            "ST_DESLOGIN_USU" => $this->getDesLogin(),
            "ST_DESENHA_USU" => $this->getDesSenha(),
            "DT_CADASTRO_USU" => $this->getDtCadastro()->format('d/m/Y H:i:s')
        ));
    }
}

?>