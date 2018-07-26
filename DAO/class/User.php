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

            // print_r($resultado); exit();

            $this->setData($resultado[0]);

        } else {

            throw new Exception("Login e/ou senha inválidos.");
        }
    }

    public function setData($data)
    {
        print_r($data); exit();
        $this->setUserId($data['idusuario']);
        $this->setLogin($data['deslogin']);
        $this->setUserPass($data['dessenha']);
        $this->setDataCad(new DateTime($data['dtcadastro']));
    }

    public function insert($login, $password)
    {
        $this->setLogin($login); $this->setUserPass($password);
        $sql = new SQL();
        $sql->query("INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :PASSWORD)", array(
            ':LOGIN' => $login,
            ':PASSWORD' => $password
            )
        );
    }

    public function select()
    {
        $sql = new SQL();
        $resultado = $sql->select('SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD', array(
            ':LOGIN' => $this->getLogin(),
            ':PASSWORD' => $this->getUserPass()
            )
        );
        print_r($resultado); exit();

        if (count($resultado) > 0) {
            $this->setUserId($resultado->idusuario);
            $this->setDataCad(new DateTime($resultado->dtcadastro));
        }
        else {
            echo 'Algo deu errado';
        }
    }

    public function update($login, $password)
    {
        $this->setLogin($login);
        $this->setUserPass($password);

        $sql = new SQL();
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
            ':LOGIN' => $this->getLogin(),
            ':PASSWORD' => $this->getUserPass(),
            ':ID' => $this->getUserId()
            )
        );
    }

    public function delete() {
        $sql = new SQL();

        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
            ':ID'=>$this->getUserId()
        ));

        $this->setUserId(0);
        $this->setLogin("");
        $this->setUserPass("");
        $this->setData(new DateTime());

    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getUserId(),
            "deslogin"=>$this->getLogin(),
            "dessenha"=>$this->getUserPass(),
            "dtcadastro"=>$this->getDataCad()->format("d/m/Y H:i:s")
            )
        );
    }
}

?>