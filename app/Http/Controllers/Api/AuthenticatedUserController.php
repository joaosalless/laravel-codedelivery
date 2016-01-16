<?php

namespace CodeDelivery\Http\Controllers\Api;

// use Illuminate\Http\Request;
// use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;
use Authorizer;

class AuthenticatedUserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show()
    {
        $userId = Authorizer::getResourceOwnerId();

        return $this->userRepository
            ->with(['client'])
            ->skipPresenter(false)
            ->find($userId);
    }
}
