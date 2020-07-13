<?php


namespace App\Http\Controllers;


use App\Repositories\PriceListRepository;

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
}
