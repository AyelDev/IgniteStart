<?php
interface ITodos{


    // add or assign todo for user
    public function addTodos($title, $dscrption, $dueDate, $userId, $createdAdmin):bool;

    // view all todos 
    public function getTodos():array;

    // view all todos assigned in current logged-in user
    public function userTodos($userId):array;
}
