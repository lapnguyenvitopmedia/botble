<?php

namespace Botble\Concept\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Concept\Http\Requests\ConceptRequest;
use Botble\Concept\Repositories\Interfaces\ConceptInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Concept\Tables\ConceptTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Concept\Forms\ConceptForm;
use Botble\Base\Forms\FormBuilder;

class ConceptController extends BaseController
{
    /**
     * @var ConceptInterface
     */
    protected $conceptRepository;

    /**
     * @param ConceptInterface $conceptRepository
     */
    public function __construct(ConceptInterface $conceptRepository)
    {
        $this->conceptRepository = $conceptRepository;
    }

    /**
     * @param ConceptTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ConceptTable $table)
    {
        page_title()->setTitle(trans('plugins/concept::concept.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/concept::concept.create'));

        return $formBuilder->create(ConceptForm::class)->renderForm();
    }

    /**
     * @param ConceptRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ConceptRequest $request, BaseHttpResponse $response)
    {
        $concept = $this->conceptRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CONCEPT_MODULE_SCREEN_NAME, $request, $concept));

        return $response
            ->setPreviousUrl(route('concept.index'))
            ->setNextUrl(route('concept.edit', $concept->id))
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
        $concept = $this->conceptRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $concept));

        page_title()->setTitle(trans('plugins/concept::concept.edit') . ' "' . $concept->name . '"');

        return $formBuilder->create(ConceptForm::class, ['model' => $concept])->renderForm();
    }

    /**
     * @param $id
     * @param ConceptRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ConceptRequest $request, BaseHttpResponse $response)
    {
        $concept = $this->conceptRepository->findOrFail($id);

        $concept->fill($request->input());

        $this->conceptRepository->createOrUpdate($concept);

        event(new UpdatedContentEvent(CONCEPT_MODULE_SCREEN_NAME, $request, $concept));

        return $response
            ->setPreviousUrl(route('concept.index'))
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
            $concept = $this->conceptRepository->findOrFail($id);

            $this->conceptRepository->delete($concept);

            event(new DeletedContentEvent(CONCEPT_MODULE_SCREEN_NAME, $request, $concept));

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
            $concept = $this->conceptRepository->findOrFail($id);
            $this->conceptRepository->delete($concept);
            event(new DeletedContentEvent(CONCEPT_MODULE_SCREEN_NAME, $request, $concept));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
