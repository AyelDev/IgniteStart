<?php
interface IAdmin{
    public function addAdmin($name, $email, $username, $password):bool;

    public function getAdmins():array;
}
