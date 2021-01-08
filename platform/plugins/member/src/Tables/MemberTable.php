<?php

namespace Botble\Member\Tables;

use BaseHelper;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MemberTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * MemberTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param MemberInterface $memberRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, MemberInterface $memberRepository)
    {
        $this->repository = $memberRepository;
        $this->setOption('id', 'table-members');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['member.edit', 'member.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('first_name', function ($item) {
                if (!Auth::user()->hasPermission('member.edit')) {
                    return $item->getFullName();
                }

                return Html::link(route('member.edit', $item->id), $item->getFullName());
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('member.edit', 'member.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = app(MemberInterface::class)->getModel();
        $select = [
            'members.id',
            'members.first_name',
            'members.last_name',
            'members.email',
            'members.created_at',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id'         => [
                'name'  => 'members.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'first_name' => [
                'name'  => 'members.first_name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'email'      => [
                'name'  => 'members.email',
                'title' => trans('core/base::tables.email'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'members.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('member.create'), 'member.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Member::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('member.deletes'), 'member.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'members.first_name' => [
                'title'    => trans('plugins/member::member.first_name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'members.last_name'  => [
                'title'    => trans('plugins/member::member.last_name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'members.email'      => [
                'title'    => trans('core/base::tables.email'),
                'type'     => 'text',
                'validate' => 'required|max:120|email',
            ],
            'members.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
