<?php
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 3/24/2020
 * Time: 1:18 PM
 */
session_start();
include '../database/connection.php';
class Account
{
    private $id;
    private $value;
    private $setStatusTimeColumn;

    /**
     * @return mixed
     */
    public function getSetStatusTimeColumn()
    {
        return $this->setStatusTimeColumn;
    }

    /**
     * @param mixed $setStatusTimeColumn
     */
    public function setSetStatusTimeColumn($setStatusTimeColumn): void
    {
        $this->setStatusTimeColumn = $setStatusTimeColumn;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function update($account, $db)
    {
        $db->active_load->updateOne(['companyID' => (int)$_SESSION['companyId'], 'activeload._id' => (int)$this->getId()],
            ['$set' => ['activeload.$.status' => $this->value,'activeload.$.'.$this->setStatusTimeColumn => time()]]
        );
    }
}