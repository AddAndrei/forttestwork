<?php


namespace App\Http\Controllers;


use App\Repositories\ManufacturerRepository;
use App\Repositories\ModelsRepository;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * @param ModelsRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ModelsRepository $repository)
    {

        return view('models.index',[
            'models' => $repository->paginate(15)
        ]);
    }

    /**
     * @param ManufacturerRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(ManufacturerRepository $repository)
    {
        return view('models.create',[
           'manufacturers' => $repository->getAll()
        ]);
    }

    /**
     * @param Request $request
     * @param ModelsRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savemodels(Request $request, ModelsRepository $repository)
    {
        $repository->create($request->post());
        return $this->Back();
    }

    /**
     * @param $id
     * @param ModelsRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function drop($id, ModelsRepository $repository)
    {
        $repository->dropById($id);
        return $this->Back();
    }

    /**
     * @param $id
     * @param ModelsRepository $repository
     */
    public function redact($id,ModelsRepository $repository,ManufacturerRepository $manufacturerRepository)
    {

        return view('models.redact', [
            'manufacturers' => $manufacturerRepository->getAll(),
            'model' => $repository->getById($id)->toArray()[0]
        ]);
    }

    /**
     * @param Request $request
     * @param ModelsRepository $repository
     */
    public function update(Request $request,ModelsRepository $repository)
    {
        $repository->update($request->post());
        return redirect()->route('models');
    }

    /**
     * @param Request $request
     * @param ModelsRepository $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, ModelsRepository $repository)
    {
        //dd($repository->whereLike($request->get('s')));
        return view('models.search',[
            'models' => $repository->whereLike($request->get('s'))
        ]);
    }
}
