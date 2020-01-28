<?php
//session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author HARDIK
 */
class Auth implements IteratorAggregate {
    //put your code here
    private $id;
    private $companyName;
    private $companyEmail;
    private $companyContact;
    private $companyAddress;
    private $companyPassword;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getcompanyName() {
        return $this->companyName;
    }
    
    public function setcompanyName($companyName) {
        $this->companyName = $companyName;
    }
    
    public function getcompanyEmail() {
        return $this->companyEmail;
    }
    
    public function setcompanyEmail($companyEmail) {
        $this->companyEmail = $companyEmail;
    }
    
    public function getcompanyContact() {
        return $this->companyContact;
    }
    
    public function setcompanyContact($companyContact) {
        $this->companyContact = $companyContact;
    }
    
    public function getcompanyAddress() {
        return $this->companyAddress;
    }
    
    public function setcompanyAddress($companyAddress) {
        $this->companyAddress = $companyAddress;
    }
    
    public function getcompanyPassword() {
        return $this->companyPassword;
    }
    
    public function setcompanyPassword($companyPassword) {
        $this->companyPassword = $companyPassword;
    }
    
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
            return new ArrayIterator(
                array(
                    '_id' => $this->id,
                    'companyName' => $this->companyName,
                    'companyEmail' => $this->companyEmail,
                    'companyContact' => $this->companyContact,
                    'companyAddress' => $this->companyAddress,
                    'companyPassword' => $this->companyPassword
                )
            );
    }
    
    public function insert($auth,$db) {
        $au = iterator_to_array($auth);
        $db->companyAdmin->insertOne($au);
    }
    
    public function login($auth,$db) {
        session_start();
        $email = $this->companyEmail;
        $pass = $this->companyPassword;
        $email_data = '';
        $pass_data = '';

        $data = $db->companyAdmin->find(['companyEmail' => $email,'companyPassword' => $pass]);
        foreach ($data as $d) {
            $company_id = $d['_id'];
            $email_data = $d['companyEmail'];
            $pass_data = $d['companyPassword'];
            $companyName = $d['companyName'];
        }

        if ($email == $email_data && $pass == $pass_data) {
            $_SESSION['company'] = 'user';
            $_SESSION['companyName'] = $companyName;
            $_SESSION['companyId'] = $company_id;
            echo "valid";
        } else {
            echo "invalid";
        }

    }
    
}
