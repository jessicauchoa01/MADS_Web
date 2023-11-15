<?php

namespace GoEat;

class Tipo extends Model
{
    protected ?int $id;
    protected ?string $tipo;
    
    public function __construct(string $tipo ='')
    {
        parent::__construct('tipos', 'id');
        
        $this->id = null;
        $this->tipo = $tipo;
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
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}