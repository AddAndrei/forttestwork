<?php


namespace App\Http\Controllers;


use App\Repositories\ManufacturerRepository;
use App\Repositories\ModelsRepository;
use App\Repositories\PriceListRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\SellersRepository;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * @param PriceListRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PriceListRepository $repository)
    {
        return view('pricelist.index',[
            'pricelist' => $repository->paginate(15)
        ]);
    }

    /**
     * @param SellersRepository $sellers
     * @param ManufacturerRepository $manufacturerRepository
     * @param ProductsRepository $productsRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(SellersRepository $sellers, ManufacturerRepository $manufacturerRepository, ProductsRepository $productsRepository)
    {
        return view('pricelist.create', [
            'sellers' => $sellers->getAll(),
            'manufacturers' => $manufacturerRepository->getAll(),
            'products' => $productsRepository->getAll(),
        ]);
    }

    /**
     * выборка моделей от изготовителей
     * @param Request $request
     * @param ModelsRepository $repository
     * @return mixed
     */
    public function getmodels(Request $request,ModelsRepository $repository)
    {
        return $repository->getByField('manufacturer_id', $request->post('id'));
    }

    /**
     * создание
     * @param Request $request
     * @param PriceListRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request,PriceListRepository $repository)
    {
        $repository->create($request->post());
        return $this->Back();
    }

    /**
     * @param $id
     * @param PriceListRepository $repository
     */
    public function drop($id, PriceListRepository $repository)
    {
        $repository->dropById($id);
        return $this->Back();
    }

}
