<?php

namespace Test\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\ResultInterface;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Mvc\ModelInterface;

class Projet extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     *
     * @var integer
     * @Column(column="id_client", type="integer", nullable=false)
     */
    protected $id_client;

    /**
     *
     * @var integer
     * @Column(column="id_developpeur", type="integer", nullable=true)
     */
    protected $id_developpeur;

    /**
     *
     * @var integer
     * @Column(column="id_chefdeprojet", type="integer", nullable=true)
     */
    protected $id_chefdeprojet;

    /**
     *
     * @var string
     * @Column(column="nom", type="string", length=75, nullable=true)
     */
    protected $nom;

    /**
     *
     * @var string
     * @Column(column="type", type="string", length='1','2','3', nullable=false)
     */
    protected $type;

    const _TYPE_1_APPLICATION_ = 1;
    const _TYPE_2_MODULE_ = 2;
    const _TYPE_3_COMPOSANT_ = 3;

    /* cette methode sert à traduire les types des projets*/
    public function translateType( ) : string
    {
        switch ($this->getType()){
            case self::_TYPE_1_APPLICATION_: return 'Application';
            case self::_TYPE_2_MODULE_ : return 'Module';
            case self::_TYPE_3_COMPOSANT_: return 'Composant';
            default : return 'Pas de projet'  ;
        }
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     *
     * @var integer
     * @Column(column="id_application", type="integer", nullable=true)
     */
    protected $id_application;

    /**
     *
     * @var integer
     * @Column(column="id_module", type="integer", nullable=true)
     */
    protected $id_module;

    /**
     *
     * @var integer
     * @Column(column="id_composant", type="integer", nullable=true)
     */
    protected $id_composant;

    /**
     *
     * @var integer
     * @Column(column="prix", type="integer", nullable=false)
     */
    protected $prix;

    /**
     *
     * @var string
     * @Column(column="statut", type="string", length='0','1','2','3','4', nullable=false)
     */
    protected $statut;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */

    /**
     * Method to set the value of field id_client
     *
     * @param integer $id_client
     * @return $this
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * Method to set the value of field id_developpeur
     *
     * @param integer $id_developpeur
     * @return $this
     */
    public function setIdDeveloppeur($id_developpeur)
    {
        $this->id_developpeur = $id_developpeur;

        return $this;
    }

    /**
     * Method to set the value of field id_chefdeprojet
     *
     * @param integer $id_chefdeprojet
     * @return $this
     */
    public function setIdChefdeprojet($id_chefdeprojet)
    {
        $this->id_chefdeprojet = $id_chefdeprojet;

        return $this;
    }

    /**
     * Method to set the value of field nom
     *
     * @param string $nom
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field id_application
     *
     * @param integer $id_application
     * @return $this
     */
    public function setIdApplication($id_application)
    {
        $this->id_application = $id_application;

        return $this;
    }

    /**
     * Method to set the value of field id_module
     *
     * @param integer $id_module
     * @return $this
     */
    public function setIdModule($id_module)
    {
        $this->id_module = $id_module;

        return $this;
    }

    /**
     * Method to set the value of field id_composant
     *
     * @param integer $id_composant
     * @return $this
     */
    public function setIdComposant($id_composant)
    {
        $this->id_composant = $id_composant;

        return $this;
    }

    /**
     * Method to set the value of field prix
     *
     * @param integer $prix
     * @return $this
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Method to set the value of field statut
     *
     * @param string $statut
     * @return $this
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field id_client
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * Returns the value of field id_developpeur
     *
     * @return integer
     */
    public function getIdDeveloppeur()
    {
        return $this->id_developpeur;
    }

    /**
     * Returns the value of field id_chefdeprojet
     *
     * @return integer
     */
    public function getIdChefdeprojet()
    {
        return $this->id_chefdeprojet;
    }

    /**
     * Returns the value of field nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return intval($this->type);
    }

    /**
     * Returns the value of field id_application
     *
     * @return integer
     */
    public function getIdApplication()
    {
        return $this->id_application;
    }

    /**
     * Returns the value of field id_module
     *
     * @return integer
     */
    public function getIdModule()
    {
        return $this->id_module;
    }

    /**
     * Returns the value of field id_composant
     *
     * @return integer
     */
    public function getIdComposant()
    {
        return $this->id_composant;
    }

    /**
     * Returns the value of field prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Returns the value of field statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ECF_C7");
        $this->setSource("projet");
        $this->hasOne('id_client', 'Test\Models\Client', 'id', ['alias' => 'Client']);
        $this->hasOne('id_chefdeprojet', 'Test\Models\Projet', 'id', ['alias' => 'ChefDeProjet']);
        $this->hasMany('id_developpeur', 'Test\Models\Developpeur', 'id', ['alias' => 'Developpeur']);
        $this->hasOne('id_application', 'Test\Models\Application', 'id', ['alias' => 'Application']);
        $this->hasOne('id_module', 'Test\Models\Module', 'id', ['alias' => 'Module']);
        $this->hasOne('id_composant', 'Test\Models\Composant', 'id', ['alias' => 'Composant']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet[]|Projet|ResultSetInterface
     */
    public static function find($parameters = null): ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet|ResultInterface|ModelInterface|null
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
