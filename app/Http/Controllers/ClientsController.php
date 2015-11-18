<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Flash;

class ClientsController extends Controller
{
    private $repository;
    private $clientService;

    public function __construct(
        ClientRepository $repository,
        ClientService $clientService
    ) {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index(ClientRepository $repository)
    {
        $clients = $this->repository->paginate(15);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->clientService->create($data);
        Flash::success('Registro gravado com sucesso.');

        return redirect()->route('admin.clients.index');
    }

    public function show($id)
    {
        $client = $this->repository->with(['user'])->find($id);

        return view('admin.clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->repository->with(['user'])->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();
        $this->clientService->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        $client = $this->repository->find($id);

        if (!$client->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->repository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.clients.index');
    }
}
