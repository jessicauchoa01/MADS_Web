<?php

namespace GoEat;

class Situacao extends Model
{
    protected ?int $id;
    protected ?string $situacao;

    public function __construct(string $situacao = ''){

        parent::__construct('situacoes', 'id');

        $this->id = null;
        $this->situacao = $situacao;
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
     * Get the value of situacao
     */ 
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     *
     * @return  self
     */ 
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }
}
