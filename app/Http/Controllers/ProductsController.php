<?php


namespace App\Http\Controllers;


use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @param ProductsRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ProductsRepository $repository)
    {
        return view('products.index',[
            'products' => $repository->paginate(15)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param Request $request
     * @param ProductsRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveproduct(Request $request,ProductsRepository $repository)
    {
        $repository->create($request->post());
        return $this->Back();
    }

    /**
     * @param $id
     * @param ProductsRepository $repository
     */
    public function drop($id, ProductsRepository $repository)
    {
        $repository->dropById($id);
        return $this->Back();
    }

    /**
     * @param $id
     * @param ProductsRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redact($id, ProductsRepository $repository)
    {
        return view('products.redact',[
            'product' => $repository->getById($id)->toArray()[0]
        ]);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, ProductsRepository $repository)
    {
        $repository->update($request->post());
        return redirect()->route('products');
    }

    /**
     * @param Request $request
     * @param ProductsRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, ProductsRepository $repository)
    {
        return view('products.search',[
            'products' => $repository->whereLike($request->get('s'))->toArray()
        ]);
    }
}
