<?php
interface IUser{
    public function addUser(string $firstName, string $lastName, string $email, string $contactNumber, string $address, string $username, string $password):bool;

    public function getUsers();

    public function getUser($id);

}