<?php

namespace Botble\Banners\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Banners\Http\Requests\BannersRequest;
use Botble\Banners\Repositories\Interfaces\BannersInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Banners\Tables\BannersTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Banners\Forms\BannersForm;
use Botble\Base\Forms\FormBuilder;
use DB;

class BannersController extends BaseController
{
    /**
     * @var BannersInterface
     */
    protected $bannersRepository;

    /**
     * @param BannersInterface $bannersRepository
     */
    public function __construct(BannersInterface $bannersRepository)
    {
        $this->bannersRepository = $bannersRepository;
    }

    /**
     * @param BannersTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(BannersTable $table)
    {
        page_title()->setTitle(trans('plugins/banners::banners.name'));

        // return $table->renderTable();
        return view('plugins/banners::banner');
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/banners::banners.create'));

        return $formBuilder->create(BannersForm::class)->renderForm();
    }

    /**
     * @param BannersRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(BannersRequest $request, BaseHttpResponse $response)
    {
        $banners = $this->bannersRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(BANNERS_MODULE_SCREEN_NAME, $request, $banners));

        return $response
            ->setPreviousUrl(route('banners.index'))
            ->setNextUrl(route('banners.edit', $banners->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $banners = $this->bannersRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $banners));

        page_title()->setTitle(trans('plugins/banners::banners.edit') . ' "' . $banners->name . '"');

        return $formBuilder->create(BannersForm::class, ['model' => $banners])->renderForm();
    }

    /**
     * @param $id
     * @param BannersRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, BannersRequest $request, BaseHttpResponse $response)
    {
        $banners = $this->bannersRepository->findOrFail($id);

        $banners->fill($request->input());

        $this->bannersRepository->createOrUpdate($banners);

        event(new UpdatedContentEvent(BANNERS_MODULE_SCREEN_NAME, $request, $banners));

        return $response
            ->setPreviousUrl(route('banners.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $banners = $this->bannersRepository->findOrFail($id);

            $this->bannersRepository->delete($banners);

            event(new DeletedContentEvent(BANNERS_MODULE_SCREEN_NAME, $request, $banners));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $banners = $this->bannersRepository->findOrFail($id);
            $this->bannersRepository->delete($banners);
            event(new DeletedContentEvent(BANNERS_MODULE_SCREEN_NAME, $request, $banners));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
  
}
