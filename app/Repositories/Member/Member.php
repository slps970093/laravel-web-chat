<?php


namespace App\Repositories\Member;

use App\Entities\Member\Member as MemberEntity;
use App\Repositories\Member\Exceptions\SerialExist;

class Member
{
    /**
     * @var MemberEntity
     */
    private $entity;

    public function __construct(MemberEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * 新增資料
     * @param array $data
     * @param string $serial
     * @return MemberEntity
     * @throws SerialExist
     */
    public function append($data, $serial)
    {
        $serialCount = $this->entity
            ->select("count(*) as count")
            ->where('serial', '=', $serial)
            ->value('count');

        if ($serialCount >= 1) {
            throw new SerialExist('會員序號已經存在');
        }

        $data['serial'] = $serial;

        return $this->entity->create($data);
    }

    public function modifyByPrimaryKey($data, $primaryKey)
    {
        if (array_key_exists('serial', $data)) {
            unlink($data['serial']);
        }
        return $this->entity->where('id', '=', $primaryKey)
            ->update($data);
    }

    public function getDataByPrimaryKey($primaryKey)
    {
        return $this->entity->find($primaryKey);
    }
}
