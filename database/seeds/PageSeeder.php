<?php

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\Slug\Models\Slug;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cms:plugin:activate', ['name' => 'contact']);
        Artisan::call('cms:plugin:activate', ['name' => 'language']);

        $data = [
            'en_US' => [
                [
                    'name'     => 'Contact',
                    'content'  => Html::tag('p',
                            'Address: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', 'Hotline: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', 'For the fastest reply, please use the contact form below.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Liên hệ',
                    'content'  => Html::tag('p',
                            'Địa chỉ: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', 'Đường dây nóng: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', 'Để được trả lời nhanh nhất, vui lòng sử dụng biểu mẫu liên hệ bên dưới.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
            ],
        ];

        Page::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($data as $locale => $pages) {
            foreach ($pages as $index => $item) {
                $page = Page::create($item);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $page->id,
                    'key'            => Str::slug($page->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = md5($page->id . Page::class . time());

                $languageMeta = LanguageMeta::where([
                    'reference_id'   => $index + 1,
                    'reference_type' => Page::class,
                ])->first();

                if ($languageMeta) {
                    $originValue = $languageMeta->lang_meta_origin;
                }

                LanguageMeta::insert([
                    'reference_id'     => $page->id,
                    'reference_type'   => Page::class,
                    'lang_meta_code'   => $locale,
                    'lang_meta_origin' => $originValue,
                ]);
            }
        }
    }
}
