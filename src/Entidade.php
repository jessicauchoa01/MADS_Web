<?php

namespace GoEat;

abstract class Entidade
{
    protected ?int $id;
    protected string $nome;
    protected string $nif;
    protected string $telemovel;
    protected int $morada;
    protected int $estado;
    
    public function __construct(
        string $nome = '',
        string $nif = '',
        string $telemovel = '',
        int $morada = 0,
        int $estado = 0
    )
    {

        $this->id = null;
        $this->nome = $nome;
        $this->nif = $nif;
        $this->telemovel = $telemovel;
        $this->morada = $morada;
        $this->estado = $estado;
    }
    
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
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
     * Get the value of nif
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set the value of nif
     *
     * @return  self
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get the value of morada
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * Set the value of morada
     *
     * @return  self
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }



    /**
     * Get the value of telemovel
     */ 
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    /**
     * Set the value of telemovel
     *
     * @return  self
     */ 
    public function setTelemovel($telemovel)
    {
        $this->telemovel = $telemovel;

        return $this;
    }
}