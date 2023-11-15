<?php

namespace GoEat;

class Cliente extends Entidade
{
    protected array $encomendas;

    public function __construct(
        string $nome = '',
        string $nif = '',
        string $telemovel = '',
        int $morada = 0,
        int $estado = 0,
        array $encomendas = []
    )
    {
        parent::__construct(
            $nome,
            $nif,
            $telemovel,
            $morada,
            $estado,
            $tableName = 'clientes',
            $primaryKey = 'id',
            $excludedProperties = ['encomendas']
        );

        $this->tableName = 'clientes';
        $this->primaryKey = 'id';
        $this->excludedProperties = ['encomendas'];

        $this->encomendas = $encomendas;
    }


    /**
     * Get the value of encomendas
     */ 
    public function getEncomendas()
    {
        return $this->encomendas;
    }

    /**
     * Set the value of encomendas
     *
     * @return  self
     */ 
    public function setEncomendas($encomendas)
    {
        $this->encomendas = $encomendas;

        return $this;
    }
}