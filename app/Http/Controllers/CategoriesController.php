<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Flash;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(CategoryRepository $repository)
    {
        $categories = $this->repository->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        Flash::success('Registro gravado com sucesso.');

        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        $category = $this->repository->find($id);

        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = $this->repository->find($id);

        if (!$category->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->repository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.categories.index');
    }
}
