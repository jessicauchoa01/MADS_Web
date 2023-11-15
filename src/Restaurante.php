<?php

namespace GoEat;

use Carbon\Carbon;
class Restaurante extends Entidade
{
    protected string $telefone;
    protected string $designacao;
    protected string $url;
    protected string $responsavel;
    protected string $contactoResponsavel;

    protected string $abertura;
    protected string $fecho;
    protected int $segunda;
    protected int $terca;
    protected int $quarta;
    protected int $quinta;
    protected int $sexta;
    protected int $sabado;
    protected int $domingo;
    protected int $mbway;
    protected int $visa;
    protected int $multibanco;
    protected int $numerario;

    public function __construct(
        string $nome= '',
        string $nif= '',
        string $telemovel= '',
        int $morada=0,
        int $estado=0,

        string $telefone= '',
        string $designacao= '',
        string $url= '',
        string $responsavel= '',
        string $contactoResponsavel= '',

        string $abertura= '',
        string $fecho= '',
        int $segunda = 0,
        int $terca = 0,
        int $quarta = 0,
        int $quinta = 0,
        int $sexta = 0,
        int $sabado = 0,
        int $domingo = 0,
        int $mbway = 0,
        int $visa = 0,
        int $multibanco = 0,
        int $numerario = 0
    ){

        parent::__construct($nome, $nif, $telemovel, $morada, $estado, $tableName = 'restaurantes', $primaryKey = 'id', $excludedProperties = []);

        $this->telefone = $telefone;
        $this->designacao = $designacao;
        $this->abertura = $abertura;
        $this->fecho = $fecho;
        $this->url = $url;
        $this->responsavel = $responsavel;
        $this->contactoResponsavel = $contactoResponsavel;
        $this->tableName = 'restaurantes';
        $this->primaryKey = 'id';
        $this->excludedProperties = [];
        $this->segunda = $segunda;
        $this->terca = $terca;
        $this->quarta = $quarta;
        $this->quinta = $quinta;
        $this->sexta = $sexta;
        $this->sabado = $sabado;
        $this->domingo = $domingo;
        $this->mbway = $mbway;
        $this->visa = $visa;
        $this->multibanco = $multibanco;
        $this->numerario = $numerario;
    }

    
    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of designacao
     */ 
    public function getDesignacao()
    {
        return $this->designacao;
    }

        /**
     * Set the value of designacao
     *
     * @return  self
     */ 
    public function setDesignacao($designacao)
    {
        $this->designacao = $designacao;

        return $this;
    }
    
    /**
     * Get the value of abertura
     */ 
    public function getAbertura()
    {
        return $this->abertura;
    }

    /**
     * Set the value of abertura
     *
     * @return  self
     */ 
    public function setAbertura($abertura)
    {
        $this->abertura = $abertura;

        return $this;
    }

    /**
     * Get the value of fecho
     */ 
    public function getFecho()
    {
        return $this->fecho;
    }

    /**
     * Set the value of fecho
     *
     * @return  self
     */ 
    public function setFecho($fecho)
    {
        $this->fecho = $fecho;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of responsavel
     */ 
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set the value of responsavel
     *
     * @return  self
     */ 
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get the value of contactoResposavel
     */ 
    public function getContactoResponsavel()
    {
        return $this->contactoResponsavel;
    }

    /**
     * Set the value of contactoResposavel
     *
     * @return  self
     */ 
    public function setContactoResposavel($contactoResposavel)
    {
        $this->contactoResposavel = $contactoResposavel;

        return $this;
    }



    /**
     * Get the value of segunda
     */ 
    public function getSegunda()
    {
        return $this->segunda;
    }

    /**
     * Set the value of segunda
     *
     * @return  self
     */ 
    public function setSegunda($segunda)
    {
        $this->segunda = $segunda;

        return $this;
    }

    /**
     * Get the value of terca
     */ 
    public function getTerca()
    {
        return $this->terca;
    }

    /**
     * Set the value of terca
     *
     * @return  self
     */ 
    public function setTerca($terca)
    {
        $this->terca = $terca;

        return $this;
    }

    /**
     * Get the value of quarta
     */ 
    public function getQuarta()
    {
        return $this->quarta;
    }

    /**
     * Set the value of quarta
     *
     * @return  self
     */ 
    public function setQuarta($quarta)
    {
        $this->quarta = $quarta;

        return $this;
    }

    /**
     * Get the value of quinta
     */ 
    public function getQuinta()
    {
        return $this->quinta;
    }

    /**
     * Set the value of quinta
     *
     * @return  self
     */ 
    public function setQuinta($quinta)
    {
        $this->quinta = $quinta;

        return $this;
    }

    /**
     * Get the value of sexta
     */ 
    public function getSexta()
    {
        return $this->sexta;
    }

    /**
     * Set the value of sexta
     *
     * @return  self
     */ 
    public function setSexta($sexta)
    {
        $this->sexta = $sexta;

        return $this;
    }

    /**
     * Get the value of sabado
     */ 
    public function getSabado()
    {
        return $this->sabado;
    }

    /**
     * Set the value of sabado
     *
     * @return  self
     */ 
    public function setSabado($sabado)
    {
        $this->sabado = $sabado;

        return $this;
    }

    /**
     * Get the value of domingo
     */ 
    public function getDomingo()
    {
        return $this->domingo;
    }

    /**
     * Set the value of domingo
     *
     * @return  self
     */ 
    public function setDomingo($domingo)
    {
        $this->domingo = $domingo;

        return $this;
    }

    /**
     * Get the value of mbway
     */ 
    public function getMbway()
    {
        return $this->mbway;
    }

    /**
     * Set the value of mbway
     *
     * @return  self
     */ 
    public function setMbway($mbway)
    {
        $this->mbway = $mbway;

        return $this;
    }

    /**
     * Get the value of visa
     */ 
    public function getVisa()
    {
        return $this->visa;
    }

    /**
     * Set the value of visa
     *
     * @return  self
     */ 
    public function setVisa($visa)
    {
        $this->visa = $visa;

        return $this;
    }

    /**
     * Get the value of multibanco
     */ 
    public function getMultibanco()
    {
        return $this->multibanco;
    }

    /**
     * Set the value of multibanco
     *
     * @return  self
     */ 
    public function setMultibanco($multibanco)
    {
        $this->multibanco = $multibanco;

        return $this;
    }

    /**
     * Get the value of numerario
     */ 
    public function getNumerario()
    {
        return $this->numerario;
    }

    /**
     * Set the value of numerario
     *
     * @return  self
     */ 
    public function setNumerario($numerario)
    {
        $this->numerario = $numerario;

        return $this;
    }

    public function getOpen($x)
    {
        if($x == 'Monday'){
            return $this->getSegunda();
        }else if ($x == 'Tuesday'){
            return $this->getTerca();
        }else if ($x == 'Wednesday'){
            return $this->getQuarta();
        }else if ($x == 'Thursday'){
            return $this->getQuinta();
        }else if ($x == 'Friday'){
            return $this->getSexta();
        }else if ($x == 'Saturday'){
            return $this->getSabado();
        }else if ($x == 'Sunday'){
            return $this->getDomingo();
        }
    }

    public function getEmenta(): array
    {
        $ementa = [];
        $pratos = Prato::search([['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $this->id]]);
        foreach ($pratos as $prato){
            $ementa [] = $prato->getId();
        }
        return $ementa;
    }
}