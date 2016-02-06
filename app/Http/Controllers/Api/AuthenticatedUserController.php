<?php

namespace CodeDelivery\Http\Controllers\Api;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
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

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();

        return $this->userRepository
            ->with(['client'])
            ->skipPresenter(false)
            ->find($userId);
    }

    public function updateDeviceToken(Request $request)
    {
        $userId = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        return $this->userRepository->updateDeviceToken($userId, $deviceToken);
    }
}
