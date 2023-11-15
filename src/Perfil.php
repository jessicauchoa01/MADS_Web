<?php

namespace GoEat;

class Perfil extends Model
{
    protected ?int $id;
    protected ?string $perfil;

    public function __construct(string $perfil = ''){

        parent::__construct('perfis', 'id');

        $this->id = null;
        $this->perfil = $perfil;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
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
}