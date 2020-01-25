<?php


namespace App\Services\Member;

use Firebase\JWT\JWT;
use App\Repositories\Member\Member as MemberRepo;

class Member
{

    private $repo;

    public function __construct(MemberRepo $repo)
    {
        $this->repo = $repo;
    }

    public function createTokenByPrimaryKey($primaryKey)
    {
        $result = $this->repo->getDataByPrimaryKey($primaryKey);
        $data = [
            'serial' => $result->serial
        ];
        return JWT::encode($data, $_ENV['JWT_KEY']);
    }
}
