<?php

namespace GoEat;

class Morada extends Model
{
    protected ?int $id;
    protected string $rua;
    protected string $numPorta;
    protected string $codPostal;
    protected string $localidade;
    protected string $pais;

    public function __construct(
        string $rua = '',
        string $numPorta = '',
        string $codPostal = '',
        string $localidade = '',
        string $pais = ''
    )
    {
        parent::__construct('moradas', 'id');

        $this->id = null;
        $this->rua = $rua;
        $this->numPorta = $numPorta;
        $this->codPostal = $codPostal;
        $this->localidade = $localidade;
        $this->pais = $pais;
    }


    /**
     * Get the value of rua
     */ 
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     *
     * @return  self
     */ 
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get the value of numPorta
     */ 
    public function getNumPorta()
    {
        return $this->numPorta;
    }

    /**
     * Set the value of numPorta
     *
     * @return  self
     */ 
    public function setNumPorta($numPorta)
    {
        $this->numPorta = $numPorta;

        return $this;
    }

    /**
     * Get the value of codPostal
     */ 
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * Set the value of codPostal
     *
     * @return  self
     */ 
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get the value of localidade
     */ 
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * Set the value of localidade
     *
     * @return  self
     */ 
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;

        return $this;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
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
}