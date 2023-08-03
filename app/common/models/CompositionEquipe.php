<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\ResultInterface;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Mvc\ModelInterface;

class CompositionEquipe extends Model
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
     * @Column(column="id_equipe", type="integer", nullable=true)
     */
    protected $id_equipe;

    /**
     *
     * @var integer
     * @Column(column="id_developpeur", type="integer", nullable=true)
     */
    protected $id_developpeur;

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
     * Method to set the value of field id_equipe
     *
     * @param integer $id_equipe
     * @return $this
     */
    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field id_equipe
     *
     * @return integer
     */
    public function getIdEquipe()
    {
        return $this->id_equipe;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ECF_C7");
        $this->setSource("composition_equipe");
        $this->belongsTo('id_developpeur', 'Test\Models\Developpeur', 'id', ['alias' => 'Developpeur']);
        $this->belongsTo('id_equipe', 'Test\Models\Equipe', 'id', ['alias' => 'Equipe']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompositionEquipe[]|CompositionEquipe|ResultSetInterface
     */
    public static function find($parameters = null): ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompositionEquipe|ResultInterface|ModelInterface|null
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
