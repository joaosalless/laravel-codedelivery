<?php

namespace CodeDelivery\Http\Controllers\Api;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\UserService;
use Authorizer;

class AuthenticatedUserController extends Controller
{
    private $userRepository;
    private $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();

        return $this->userRepository
            ->with(['client'])
            ->skipPresenter(false)
            ->find($userId);
    }

    public function updateProfile(Request $request)
    {
        $userId = Authorizer::getResourceOwnerId();
        $data = $request->all();
        $data['client'] = $data['client']['data'];

        return $this->userService->update($data, $userId);
    }

    public function updateDeviceToken(Request $request)
    {
        $userId = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        return $this->userRepository->updateDeviceToken($userId, $deviceToken);
    }
}
