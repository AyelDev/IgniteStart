<?php
interface IUser
{
    public function addUser(string $name, string $ctlocation, string $username, string $password): bool;

    public function getUsers();

    public function getUser($id);

}