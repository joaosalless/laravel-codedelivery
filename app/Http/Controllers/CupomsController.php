<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;
use Flash;

class CupomsController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(CupomRepository $repository)
    {
        $cupoms = $this->repository->paginate(15);

        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        Flash::success('Registro gravado com sucesso.');

        return redirect()->route('admin.cupoms.index');
    }

    public function show($id)
    {
        $cupom = $this->repository->find($id);

        return view('admin.cupoms.show', compact('cupom'));
    }

    public function edit($id)
    {
        $cupom = $this->repository->find($id);

        return view('admin.cupoms.edit', compact('cupom'));
    }

    public function update(AdminCupomRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.cupoms.index');
    }

    public function destroy($id)
    {
        $cupom = $this->repository->find($id);

        if (!$cupom->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->repository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.cupoms.index');
    }
}
