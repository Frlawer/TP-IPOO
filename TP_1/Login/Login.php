<?php
class Login
{
    private $user;
    private $pass;
    private $frase;
    private $ultimas;

    public function __construct($user, $pass, $frase, $ultimas)
    {
        $this->setUser($user);
        $this->setPass($pass);
        $this->setFrase($frase);
        $this->setUltimas($ultimas);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getFrase()
    {
        return $this->frase;
    }

    public function getUltimas()
    {
        return $this->ultimas;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setFrase($frase)
    {
        $this->frase = $frase;
    }

    public function setUltimas($ultimas)
    {
        $this->ultimas = $ultimas;
    }

    public function validarPass($pass)
    {
        return ($this->getPass() === $pass) ? true : false;
    }

    public function existePass($nuevaPass)
    {
        $existe = 'no';
        if ($this->getPass() == $nuevaPass) {
            $existe = 'si';
        } else {
            foreach ($this->getUltimas() as $key => $value) {
                ($value == $nuevaPass) ? $existe = 'si' : $existe;
            }
        }
        return $existe;
    }

    public function cambiarPass($pass)
    {
        ($this->existePass($pass)) ? $this->setPass($pass) : false;
    }

    public function recordar()
    {
        return "Frase: {$this->getFrase()}";
    }

    public function __toString()
    {
        return '(Usuario: ' . $this->getUser() . ', Contraseña: ' . $this->getPass() . ', Frase: ' . $this->getFrase() . ', Ultimas frases: 1:' . $this->getUltimas()[0] . ', 2:' . $this->getUltimas()[1] . ', 3:' . $this->getUltimas()[2] . ', 4:' . $this->getUltimas()[3] . ' )';
    }
}
