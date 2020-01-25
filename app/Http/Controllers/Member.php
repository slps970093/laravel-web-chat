<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Member\Member as MemberService;
use App\Repositories\Member\Member as MemberRepo;
use Illuminate\Support\Str;

class Member extends Controller
{
    //
    private $service;

    private $repo;

    public function __construct(MemberService $service, MemberRepo $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }

    public function index()
    {
        $res = $this->repo->getList();
        return view('member.index', [
            'res' => $res
        ]);
    }

    public function append(Request $request)
    {
        $serial = Str::random(15);
        $this->repo->append($request->toArray(), $serial);
        return response()->json(['status' => true]);
    }
}
