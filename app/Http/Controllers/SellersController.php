<?php


namespace App\Http\Controllers;


use App\Repositories\SellersRepository;
use Illuminate\Http\Request;

class SellersController extends Controller
{
    /**
     * @param SellersRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SellersRepository $repository)
    {
        return view('sellers.index',[
            'sellers' => $repository->paginate(15),
        ]);
    }

    public function create()
    {
        return view('sellers.create');
    }

    /**
     * @param Request $request
     * @param SellersRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveseller(Request $request,SellersRepository $repository)
    {
        $res = $repository->saveSeller($request->post());
        return $this->Back();
    }

    /**
     * @param $id
     * @param SellersRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function drop($id,SellersRepository $repository)
    {
        $repository->dropById($id);
        return $this->Back();
    }

    /**
     * @param $id
     * @param SellersRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redact($id,SellersRepository $repository)
    {
        return view('sellers.redact',[
            'seller' => $repository->getById($id)->toArray()[0]
        ]);

    }


    public function update(Request $request,SellersRepository $repository)
    {
        $repository->update($request->post());
        return redirect()->route('sellers');
    }

    /**
     * @param Request $request
     * @param SellersRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request,SellersRepository $repository)
    {
        return view('sellers.search',[
            'sellers' => $repository->whereLike($request->get('s'))->toArray()
        ]);
    }


}
