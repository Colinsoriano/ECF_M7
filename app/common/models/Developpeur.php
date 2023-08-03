<?php

namespace Test\Models;

use Phalcon\Mvc\Model;

class Developpeur extends Model
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
     * @Column(column="id_collaborateur", type="integer", nullable=true)
     */
    protected $id_collaborateur;

    /**
     *
     * @var integer
     * @Column(column="indice_production", type="integer", nullable=false)
     */
    protected $indice_production;

    /**
     *
     * @var string
     * @Column(column="competence", type="string", length='1','2','3', nullable=false)
     */
    protected $competence;

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
     * Method to set the value of field id_collaborateur
     *
     * @param integer $id_collaborateur
     * @return $this
     */
    public function setIdCollaborateur($id_collaborateur)
    {
        $this->id_collaborateur = $id_collaborateur;

        return $this;
    }

    /**
     * Method to set the value of field indice_production
     *
     * @param integer $indice_production
     * @return $this
     */
    public function setIndiceProduction($indice_production)
    {
        $this->indice_production = $indice_production;

        return $this;
    }

    /**
     * Method to set the value of field competence
     *
     * @param string $competence
     * @return $this
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

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
     * Returns the value of field id_collaborateur
     *
     * @return integer
     */
    public function getIdCollaborateur()
    {
        return $this->id_collaborateur;
    }

    /**
     * Returns the value of field indice_production
     *
     * @return integer
     */
    public function getIndiceProduction()
    {
        return $this->indice_production;
    }

    /**
     * Returns the value of field competence
     *
     * @return string
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ECF_C7");
        $this->setSource("developpeur");
        $this->hasMany('id', 'Test\Models\CompositionEquipe', 'id_developpeur', ['alias' => 'CompositionEquipe']);
        $this->belongsTo('id_collaborateur', 'Test\Models\Collaborateur', 'id', ['alias' => 'Collaborateur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpeur[]|Developpeur|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpeur|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

    /** custom functions */

    const _COMPETENCE_1_FRONT_ = 1;
    const _COMPETENCE_2_BACK_ = 2;
    const _COMPETENCE_3_BDD_ = 3;

    // cette methode sert à traduire les competences des developpeurs
    public function translateCompetence( ) : string
    {
        switch ($this->getCompetence( )){
            case self::_COMPETENCE_1_FRONT_:return 'FrontEnd';
            case self::_COMPETENCE_2_BACK_ :return 'BackEnd';
            case self::_COMPETENCE_3_BDD_:return 'Administrateur de base de données';
            default : return 'Competence inconnue';
        }
    }

}
