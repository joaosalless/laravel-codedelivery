<?php

namespace CodeDelivery\Services;

use CodeDelivery\Models\User;
use CodeDelivery\Models\Client;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class UserService
{
    private $clientRepository;
    private $userRepository;

    public function __construct(
        ClientRepository $clientRepository,
        UserRepository $userRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {

    }

    public function update(array $data, $id)
    {
        $user = $this->userRepository->find($id);
        $this->userRepository->update($data, $id);

        $client = $this->clientRepository->findByField('user_id', $id)->first();

        if (is_null($client)) {
            $data['client']['user_id'] = $user->id;
            $client = $this->clientRepository->create($data['client']);
        }

        $this->clientRepository->update($data['client'], $client->id);
    }
}
