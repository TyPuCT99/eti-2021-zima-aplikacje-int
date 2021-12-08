<?php

namespace App\Repository;

use App\Model\UserCredentials;

class JsonRepository
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->path = $fileName;
    }

    public function findCredentialsByUsername(string $username): ?UserCredentials
    {
        $json = file_get_contents(__DIR__ . '/../../data/users.json');

        $users = json_decode($json, true);

        foreach($users as $user) {
            if($user['username'] == $username) {
                return new UserCredentials($username, $user['password']);
            }
        }

        return null;
    }
}