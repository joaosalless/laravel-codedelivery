<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;
use Flash;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(
        ProductRepository $repository,
        CategoryRepository $categoryRepository
    ) {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(ProductRepository $repository)
    {
        $products = $this->repository->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listsCategories();

        return view('admin.products.create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        Flash::success('Registro gravado com sucesso.');

        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
        $product = $this->repository->find($id);

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);

        $categories = $this->categoryRepository->listsCategories();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        Flash::success('Registro atualizado com sucesso.');

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = $this->repository->find($id);

        if (!$product->isDeletable()) {
            Flash::error('Este registro não pode ser apagado.');
            return redirect()->back();
        }

        $this->repository->delete($id);
        Flash::success('Registro apagado com sucesso.');

        return redirect()->route('admin.products.index');
    }
}
