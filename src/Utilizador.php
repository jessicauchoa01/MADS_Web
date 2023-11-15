<?php

namespace GoEat;

class Utilizador
{
    protected ?int $id;
    protected string $nome;
    protected string $email;
    protected string $password;
    protected int $ativo;
    protected int $perfil;
    protected int $entidade;

    public function __construct(string $nome = '', string $email = '', string $password = '', int $perfil = 0, int $ativo = 0, int $entidade = 0)
    {
        $this->id = null;
        $this->nome = $nome;
        $this->email = $email;
        $this->password = $password;
        $this->ativo = $ativo;
        $this->perfil = $perfil;
        $this->entidade = $entidade;
    }

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
        /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        $perfil = Perfil::find($this->perfil);

        return $perfil->getPerfil();
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of entidade
     */ 
    public function getEntidade()
    {
        return $this->entidade;
    }

    /**
     * Set the value of entidade
     *
     * @return  self
     */ 
    public function setEntidade($entidade)
    {
        $this->entidade = $entidade;

        return $this;
    }
}