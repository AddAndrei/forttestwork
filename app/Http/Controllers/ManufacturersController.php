<?php


namespace App\Http\Controllers;


use App\Repositories\ManufacturerRepository;
use Illuminate\Http\Request;


class ManufacturersController extends Controller
{
    public function index(ManufacturerRepository $repository)
    {
        return view('manufacturers.index',[
            'manufacturers' => $repository->paginate(15)
        ]);
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manufacturers.create');
    }

    /**
     * @param Request $request
     * @param ManufacturerRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savemanufactur(Request $request, ManufacturerRepository $repository)
    {
        $repository->create($request->post());
        return $this->Back();
    }

    /**
     * @param $id
     * @param ManufacturerRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function drop($id,ManufacturerRepository $repository)
    {
        $repository->dropById($id);
        return $this->Back();
    }

    /**
     * @param $id
     * @param ManufacturerRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redact($id,ManufacturerRepository $repository)
    {
        return view('manufacturers.redact',[
            'manufacturer' => $repository->getById($id)->toArray()[0]
        ]);
    }

    /**
     * @param Request $request
     * @param ManufacturerRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ManufacturerRepository $repository)
    {
        $repository->update($request->post());
        return redirect()->route('manufacturers');
    }

    /**
     * @param Request $request
     * @param ManufacturerRepository $repository
     */
    public function search(Request $request, ManufacturerRepository $repository)
    {
        return view('manufacturers.search',[
            'manufacturers' => $repository->whereLike($request->get('s'))->toArray()
        ]);
    }



}
