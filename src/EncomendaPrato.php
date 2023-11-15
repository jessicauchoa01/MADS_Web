<?php

namespace GoEat;

class EncomendaPrato extends Model implements Mailable
{
    protected ?int $id;
    protected ?int $encomenda;
    protected ?int $prato;
    protected int $quantidade;
    protected int $situacao;

    
    public function __construct(int $encomenda = 0, int $prato = 0, int $quantidade = 0, int $situacao = 0)
    {
        parent::__construct('encomenda_prato', 'id');

        $this->id = null;
        $this->encomenda = $encomenda;
        $this->prato = $prato;
        $this->quantidade = $quantidade;
        $this->situacao = $situacao;
    }
    

    /**
     * Get the value of encomenda
     */ 
    public function getEncomenda()
    {
        return $this->encomenda;
    }

    /**
     * Set the value of encomenda
     *
     * @return  self
     */ 
    public function setEncomenda($encomenda)
    {
        $this->encomenda = $encomenda;

        return $this;
    }

    /**
     * Get the value of prato
     */ 
    public function getPrato()
    {
        return $this->prato;
    }

    /**
     * Set the value of prato
     *
     * @return  self
     */ 
    public function setPrato($prato)
    {
        $this->prato = $prato;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get the value of situacao
     */ 
    public function getSituacao()
    {
        $situacao = Situacao::find($this->situacao);

        return $situacao->getSituacao();
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

    public function getDestination(): string
    {
        $encomenda = Encomenda::find($this->getEncomenda());
        $cliente = Cliente::find($encomenda->getCliente());
        $utilizadores = Utilizador::search([['coluna' => 'entidade', 'operador' => '=' ,'valor' => $cliente->getId()]]);
        $utilizador = $utilizadores[0];
        return $utilizador->getEmail();
    }

    public function getSubject(): string
    {
        return 'Estado da Encomenda';
    }

    public function getBody(): string
    {
        $prato = Prato::find($this->getPrato());
        return "A sua encomenda encontra-se " . $this->getSituacao() . "<br>"
            . "Prato: " . $prato->getNome();
    }
}