<?php
include_once "IAdmin.php";
include_once "IUser.php";

class ServiceImp implements IUser, IAdmin{
    
    private Database $database;
    private string $algo = 'SHA3-224';
    private array $allowedTables = ['arielpw_user', 'arielpw_admin'];
    

    public function __construct(Database $database){
        $this->database = $database;
    }

    //ADMIN
    public function addAdmin($name, $email, $username, $password):bool{

        $admin = [
            'name' => $name,
            'email'=> $email,
            'username' => $username,
            'password' => hash($this->algo,$password)

        ];

        return $this->database->create($this->allowedTables[1], $admin);

    }

    public function getAdmins():array{
        return $this->database->readAll($this->allowedTables[1]);
    }

    //USER
    public function addUser(string $firstName, string $lastName, string $email, string $contactNumber, string $address, string $username, string $password) : bool{

        $user = [
        'firstname'     => $firstName,
        'lastname'      => $lastName,
        'email'          => $email,
        'contactNum' => $contactNumber,
        'address'        => $address,
        'username'       => $username,
        'password'       => hash($this->algo, $password)
    ];

        return $this->database->create($this->allowedTables[0], $user);
    }

     public function getUser($id){
        return $this->database->read($this->allowedTables[0], $id);
    }

    public function getUsers():array{
        return $this->database->readAll($this->allowedTables[0]);
    }

   public function deleteUser($id): bool{
        return $this->database->delete($this->allowedTables[0], $id);
   }

   public function updateUser(string $firstName, string $lastName, string $email, string $contactNumber, string $address, string $username, string $password, int $id):bool{
            $user = [
        'firstname'     => $firstName,
        'lastname'      => $lastName,
        'email'          => $email,
        'contactNum' => $contactNumber,
        'address'        => $address,
        'username'       => $username,
        'password'       => $password
            ];
    
        return $this->database->update($this->allowedTables[0],$user, $id);
   }



}