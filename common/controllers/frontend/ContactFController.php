<?php

class ContactFController extends  Controller
{
    public function index()
    {

        $errors = array();
        $data = array(
            'name'    => '',
            'email'   => '',
            'phone'   => '',
            'message' => '',
            'status'  => '',
        );

        if(isset($_POST['submit'])) {
            $data = array(
                'name'    => $_POST['name'],
                'email'   => $_POST['email'],
                'phone'   => $_POST['phone'],
                'message' => $_POST['message'],
                'status'  => 'waiting',
            );

//	VALIDATION


            if(empty($errors)) {
                $entity = new ContactEntity();
                $entity->InIt($data);
                $contactsCollection = new ContactsCollection();
                $contactsCollection->save($entity);
            }
        }
            $this->loadFrontView('contacts/list.php');
    }
}