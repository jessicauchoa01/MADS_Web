<?php

namespace GoEat;

class Encomenda extends Model
{
    protected ?int $id;
    protected string $data;
    protected int $cliente;
    protected float $total;
    protected array $lista;
    
    public function __construct(string $data = '', int $cliente = 0, float $total = 0)
    {
        parent::__construct('encomendas', 'id', ['lista']);

        $this->id = null;
        $this->data = $data;
        $this->cliente = $cliente;
        $this->total = $total;
        $this->lista = [];
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
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * Get the value of lista
     */ 
    public function getLista():array
    {

        $lista = EncomendaPrato::search([['coluna' => 'encomenda', 'operador' => '=' ,'valor' => $this->getId()]]);

        return $lista;
    }

    /**
     * Set the value of lista
     *
     * @return  self
     */ 
    public function setLista($lista)
    {
        $this->lista = $lista;

        return $this;
    }
}