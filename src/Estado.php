<?php

namespace GoEat;

class Estado extends Model
{
    protected ?int $id;
    protected ?string $estado;

    public function __construct(string $estado = '')
    {

        parent::__construct('estados', 'id');

        $this->id = null;
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
}