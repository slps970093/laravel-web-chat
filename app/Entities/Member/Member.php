<?php
/**
 * 會員 Entity
 *
 *
 */

namespace App\Entities\Member;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $attributes = [
        'serial',
        'account',
        'name'
    ];
}
