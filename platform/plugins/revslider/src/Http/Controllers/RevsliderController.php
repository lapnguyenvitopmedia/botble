<?php

namespace Botble\Revslider\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Revslider\Http\Requests\RevsliderRequest;
use Botble\Revslider\Repositories\Interfaces\RevsliderInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Revslider\Tables\RevsliderTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Revslider\Forms\RevsliderForm;
use Botble\Base\Forms\FormBuilder;

class RevsliderController extends BaseController
{
    /**
     * @var RevsliderInterface
     */
    protected $revsliderRepository;

    /**
     * @param RevsliderInterface $revsliderRepository
     */
    public function __construct(RevsliderInterface $revsliderRepository)
    {
        $this->revsliderRepository = $revsliderRepository;
    }

    /**
     * @param RevsliderTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(RevsliderTable $table)
    {
        page_title()->setTitle(trans('plugins/revslider::revslider.name'));
        // return $table->renderTable();

        $url = url('/revslider-standalone');
        // $url='';
        return view('plugins/revslider::index', ['url' => $url]);
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/revslider::revslider.create'));

        return $formBuilder->create(RevsliderForm::class)->renderForm();
    }

    /**
     * @param RevsliderRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(RevsliderRequest $request, BaseHttpResponse $response)
    {
        $revslider = $this->revsliderRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(REVSLIDER_MODULE_SCREEN_NAME, $request, $revslider));

        return $response
            ->setPreviousUrl(route('revslider.index'))
            ->setNextUrl(route('revslider.edit', $revslider->id))
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
        $revslider = $this->revsliderRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $revslider));

        page_title()->setTitle(trans('plugins/revslider::revslider.edit') . ' "' . $revslider->name . '"');

        return $formBuilder->create(RevsliderForm::class, ['model' => $revslider])->renderForm();
    }

    /**
     * @param $id
     * @param RevsliderRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, RevsliderRequest $request, BaseHttpResponse $response)
    {
        $revslider = $this->revsliderRepository->findOrFail($id);

        $revslider->fill($request->input());

        $this->revsliderRepository->createOrUpdate($revslider);

        event(new UpdatedContentEvent(REVSLIDER_MODULE_SCREEN_NAME, $request, $revslider));

        return $response
            ->setPreviousUrl(route('revslider.index'))
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
            $revslider = $this->revsliderRepository->findOrFail($id);

            $this->revsliderRepository->delete($revslider);

            event(new DeletedContentEvent(REVSLIDER_MODULE_SCREEN_NAME, $request, $revslider));

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
            $revslider = $this->revsliderRepository->findOrFail($id);
            $this->revsliderRepository->delete($revslider);
            event(new DeletedContentEvent(REVSLIDER_MODULE_SCREEN_NAME, $request, $revslider));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
