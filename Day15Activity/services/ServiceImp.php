<?php
include_once "IAdmin.php";
include_once "IUser.php";
include_once "ITodos.php";

class ServiceImp implements IUser, IAdmin, ITodos
{

    private Database $database;
    private string $algo = 'SHA3-224';

    private array $allowedTables = ['pw_user', 'pw_admin', 'pw_todos'];


    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    //ADMIN
    public function addAdmin($name, $email, $username, $password): bool
    {

        $admin = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => hash($this->algo, $password)

        ];

        return $this->database->create($this->allowedTables[1], $admin);

    }

    public function getAdmins(): array
    {
        return $this->database->readAll($this->allowedTables[1]);
    }

    public function addTodos($title, $dscrption, $dueDate, $userId, $createdAdmin): bool
    {

        $todos = [
            'title' => $title,
            'description' => $dscrption,
            'due_date' => $dueDate,
            'user_id' => $userId,
            'created_by_admin' => $createdAdmin
        ];

        return $this->database->create($this->allowedTables[2], $todos);
    }

    public function getTodos(): array
    {
        return $this->database->readAll($this->allowedTables[2]);
    }

    //USER
    public function addUser(string $name, string $ctlocation, string $username, string $password): bool
    {

        $user = [
            'name' => $name,
            'city_location' => $ctlocation,
            'username' => $username,
            'password' => hash($this->algo, $password)
        ];

        return $this->database->create($this->allowedTables[0], $user);
    }

    public function getUser($id)
    {
        return $this->database->read($this->allowedTables[0], $id);
    }

    public function getUsers(): array
    {
        return $this->database->readAll($this->allowedTables[0]);
    }

    public function deleteUser($id): bool
    {
        return $this->database->delete($this->allowedTables[0], $id);
    }

       public function updateUser(string $name, string $ctlocation, string $username, string $password, int $id): bool
    {
        $user = [
            'name' => $name,
            'city_location' => $ctlocation,
            'username' => $username,
            'password' => $password
        ];

        return $this->database->update($this->allowedTables[0], $user, $id);
    }

    public function userTodos($userId): array
    {
        $todos = $this->database->readAll($this->allowedTables[2]);

        $filteredTodos = array_filter($todos, function ($todo) use ($userId) {
            return $todo['user_id'] == $userId;
        });

        return array_values($filteredTodos);
    }

}