<?php
interface IAdmin{
    //this function for adding admin
    public function addAdmin($name, $email, $username, $password):bool;

    // this function for viewing admins
    public function getAdmins():array;
}
