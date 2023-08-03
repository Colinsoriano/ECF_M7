<?php

namespace Test\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\ResultInterface;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Mvc\ModelInterface;

class Client extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_client", type="integer", nullable=false)
     */
    protected $id_client;

    /**
     *
     * @var string
     * @Column(column="raison_sociale", type="string", length=25, nullable=false)
     */
    protected $raison_sociale;

    /**
     *
     * @var string
     * @Column(column="ridet", type="string", length=10, nullable=false)
     */
    protected $ridet;

    /**
     *
     * @var integer
     * @Column(column="ss2i", type="integer", length=1, nullable=false)
     */
    protected $ss2i;
    const _1_ = 1;
    const _0_ = 0;
    public function translateSs2i( ) : string
    {
        switch ($this->getSs2i()){
            case self::_1_:return 'Oui';
            case self::_0_ :return 'Non' ;
            default : return ' '  ;
        }
    }

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
     * Method to set the value of field raison_sociale
     *
     * @param string $raison_sociale
     * @return $this
     */
    public function setRaisonSociale($raison_sociale)
    {
        $this->raison_sociale = $raison_sociale;

        return $this;
    }

    /**
     * Method to set the value of field ridet
     *
     * @param string $ridet
     * @return $this
     */
    public function setRidet($ridet)
    {
        $this->ridet = $ridet;

        return $this;
    }

    /**
     * Method to set the value of field ss2i
     *
     * @param integer $ss2i
     * @return $this
     */
    public function setSs2i($ss2i)
    {
        $this->ss2i = $ss2i;

        return $this;
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
     * Returns the value of field raison_sociale
     *
     * @return string
     */
    public function getRaisonSociale()
    {
        return $this->raison_sociale;
    }

    /**
     * Returns the value of field ridet
     *
     * @return string
     */
    public function getRidet()
    {
        return $this->ridet;
    }

    /**
     * Returns the value of field ss2i
     *
     * @return integer
     */
    public function getSs2i()
    {
        return $this->ss2i;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ECF_C7");
        $this->setSource("client");
        $this->belongsTo('id', 'Test\Models\Projet', 'id_client', ['alias' => 'Projet']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client[]|Client|ResultSetInterface
     */
    public static function find($parameters = null): ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client|ResultInterface|ModelInterface|null
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
