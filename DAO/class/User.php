<?php

class User {

    private $idusuario;
    private $deslogin;
    private $desenha;
    private $dtcadastro;

    public function getUserId()
    {
        return $this->idusuario;
    }

    public function setUserId($id)
    {
        $this->idusuario = $id;
    }

    public function getLogin()
    {
        return $this->deslogin;
    }

    public function setLogin($login)
    {
        $this->deslogin = $login;
    }

    public function getUserPass()
    {
        return $this->desenha;
    }

    public function setUserPass($password)
    {
        $this->desenha = $password;
    }

    public function getDataCad()
    {
        return $this->dtcadastro;
    }

    public function setDataCad($date)
    {
        $this->dtcadastro = $date;
    }

    public function loadById($id)
    {
        $sql = new SQL;
        
        $resultado = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID" => $id));

        if (isset($resultado[0])) {

            $this->setData($resultado[0]);
        }
    }

    public static function getList()
    {
        $sql = new SQL();
        return  $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($value)
    {
        $sql = new SQL();
        return $sql->select(
            "SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$value."%"
            )
        );
    }

    public function login($login, $senha)
    {
        $sql = new SQL;
        
        $resultado = $sql->select(
            "SELECT * FROM tb_usuarios
            WHERE deslogin = :LOGIN
            AND dessenha = :SENHA",
            array(
                ":LOGIN" => $login,
                ":SENHA"=> $senha)
        );

        if (isset($resultado[0])) {

            $this->setData($resultado[0]);

        } else {

            throw new Exception("Login e/ou senha inválidos.");
        }
    }

    public function setData($data)
    {
        $this->setUserId($data['idusuario']);
        $this->setLogin($data['deslogin']);
        $this->setUserPass($data['dessenha']);
        $this->setDataCad(new DateTime($data['dtcadastro']));
    }

    public function insert()
    {
        $sql = new SQL();
        //$resultado = $sql->select("EXECUTE sp_usuarios_insert 'enzo', 'senha'");
        $resultado = $sql->select("EXECUTE sp_usuarios_insert :LOGIN, :PASSWORD", array(
            ":LOGIN"=>$this->getLogin(),
            ":PASSWORD"=>$this->getUserPass()
            )
        );

        if (count($resultado) > 0) {
            $this->setData($resultado[0]);
        }
        else {
            //throw new Exception("Ocorreu um erro ao tentar inserir os dados.");
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getUserId(),
            "deslogin"=>$this->getLogin(),
            "dessenha"=>$this->getUserPass(),
            "dtcadastro"=>$this->getDataCad() //->format("d/m/Y H:i:s")
            )
        );
    }
}

?>