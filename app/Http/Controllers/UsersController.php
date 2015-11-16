<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminUserRequest;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\UserService;
use Flash;

class UsersController extends Controller
{
    private $userRepository;
    private $userService;

    public function __construct(
        UserRepository $userRepository,
        UserService $userService
    ) {
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }

    public function index(UserRepository $userRepository)
    {
        $users = $this->userRepository->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->userRepository->listsRoles();

        return view('admin.users.create', compact('roles'));
    }

    public function store(AdminUserRequest $request)
    {
        $data = $request->all();
        $this->userService->create($data);
        Flash::success('Registro gravado com sucesso.');

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user  = $this->userRepository->with('client')->find($id);
        $roles = $this->userRepository->listsRoles();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(AdminUserRequest $request, $id)
    {
        $data = $request->all();
        $this->userService->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->userRepository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.users.index');
    }
}
