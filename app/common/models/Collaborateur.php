<?php

namespace Test\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\ResultInterface;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Mvc\ModelInterface;

class Collaborateur extends Model
{

    /**
     *
     * @var integer
     * @Column(column="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Primary
     * @Column(column="prenom", type="string", length=75, nullable=false)
     */
    protected $prenom;

    /**
     *
     * @var string
     * @Column(column="nom", type="string", length=75, nullable=true)
     */
    protected $nom;

    /**
     *
     * @var string
     * @Column(column="niveau_competence", type="string", length='1','2','3', nullable=false)
     */
    protected $niveau_competence;

    const _NIVEAU_1_STAGIAIRE_ = 1;
    const _NIVEAU_2_JUNIOR_ = 2;
    const _NIVEAU_3_SENIOR_ = 3;

    /* cette methode sert à traduire les niveaux des collaborateurs*/
    public function translateNiveau( ) : string
    {
        switch ($this->getNiveauCompetence()){
            case self::_NIVEAU_1_STAGIAIRE_:return 'Stagiaire';
            case self::_NIVEAU_2_JUNIOR_ :return 'Junior';
            case self::_NIVEAU_3_SENIOR_:return 'Senior';
            default : return 'Pas de niveau'  ;
        }
    }

    /**
     *
     * @var integer
     * @Column(column="prime_embauche", type="integer", nullable=false)
     */
    protected $prime_embauche;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field prenom
     *
     * @param string $prenom
     * @return $this
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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
     * Method to set the value of field niveau_competence
     *
     * @param string $niveau_competence
     * @return $this
     */
    public function setNiveauCompetence($niveau_competence)
    {
        $this->niveau_competence = $niveau_competence;

        return $this;
    }

    /**
     * Method to set the value of field prime_embauche
     *
     * @param integer $prime_embauche
     * @return $this
     */
    public function setPrimeEmbauche($prime_embauche)
    {
        $this->prime_embauche = $prime_embauche;

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
     * Returns the value of field prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
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
     * Returns the value of field niveau_competence
     *
     * @return string
     */
    public function getNiveauCompetence()
    {
        return $this->niveau_competence;
    }

    /**
     * Returns the value of field prime_embauche
     *
     * @return integer
     */
    public function getPrimeEmbauche()
    {
        return $this->prime_embauche;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ECF_C7");
        $this->setSource("collaborateur");
        $this->hasMany('id', 'Test\Models\ChefDeProjet', 'id', ['alias' => 'ChefDeProjet']);
        $this->hasMany('id', 'Test\Models\Developpeur', 'id_collaborateur', ['alias' => 'Developpeur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collaborateur[]|Collaborateur|ResultSetInterface
     */
    public static function find($parameters = null): ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collaborateur|ResultInterface|ModelInterface|null
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
