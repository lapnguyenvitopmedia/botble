<?php

use Botble\Blog\Models\Category;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cms:plugin:activate', ['name' => 'language']);

        $data = [
            'en_US' => [
                [
                    'name'     => 'Main menu',
                    'slug'     => 'main-menu',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'     => 'Home',
                            'url'       => '/',
                            'parent_id' => 0,
                        ],
                        [
                            'title'     => 'Purchase',
                            'url'       => 'https://botble.com/go/download-cms',
                            'target'    => '_blank',
                            'parent_id' => 0,
                        ],
                        [
                            'title'          => 'News & Updates',
                            'reference_id'   => 6,
                            'reference_type' => Category::class,
                            'parent_id'      => 0,
                        ],
                        [
                            'title'     => 'Galleries',
                            'url'       => '/galleries',
                            'parent_id' => 0,
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 1,
                            'reference_type' => Page::class,
                            'parent_id'      => 0,
                        ],
                    ],
                ],

                [
                    'name'  => 'Favorite websites',
                    'slug'  => 'favorite-websites',
                    'items' => [
                        [
                            'title' => 'Speckyboy Magazine',
                            'url'   => 'http://speckyboy.com',
                        ],
                        [
                            'title' => 'Tympanus-Codrops',
                            'url'   => 'http://tympanus.com',
                        ],
                        [
                            'title' => 'Kipalog Blog',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'SitePoint',
                            'url'   => 'http://www.sitepoint.com',
                        ],
                        [
                            'title' => 'CreativeBloq',
                            'url'   => 'http://www.creativebloq.com',
                        ],
                        [
                            'title' => 'Techtalk',
                            'url'   => 'http://techtalk.vn',
                        ],
                    ],
                ],

                [
                    'name'  => 'My links',
                    'slug'  => 'my-links',
                    'items' => [
                        [
                            'title' => 'Homepage',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 1,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'News & Updates',
                            'reference_id'   => 6,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Projects',
                            'reference_id'   => 3,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title' => 'Galleries',
                            'url'   => '/galleries',
                        ],
                    ],
                ],

                [
                    'name'  => 'Featured Categories',
                    'slug'  => 'featured-categories',
                    'items' => [
                        [
                            'title'          => 'Events',
                            'reference_id'   => 2,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Projects',
                            'reference_id'   => 3,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Business',
                            'reference_id'   => 4,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'News & Updates',
                            'reference_id'   => 6,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Resources',
                            'reference_id'   => 7,
                            'reference_type' => Category::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Social',
                    'slug'  => 'social',
                    'items' => [
                        [
                            'title'     => 'Facebook',
                            'url'       => 'https://facebook.com',
                            'icon_font' => 'fa fa-facebook',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Twitter',
                            'url'       => 'https://twitter.com',
                            'icon_font' => 'fa fa-twitter',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Github',
                            'url'       => 'https://github.com',
                            'icon_font' => 'fa fa-github',
                            'target'    => '_blank',
                        ],

                        [
                            'title'     => 'Linkedin',
                            'url'       => 'https://linkedin.com',
                            'icon_font' => 'fa fa-linkedin',
                            'target'    => '_blank',
                        ],
                    ],
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Menu chính',
                    'slug'     => 'menu-chinh',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'     => 'Trang chủ',
                            'url'       => '/',
                            'parent_id' => 0,
                        ],
                        [
                            'title'     => 'Mua ngay',
                            'url'       => 'https://botble.com/go/download-cms',
                            'target'    => '_blank',
                            'parent_id' => 0,
                        ],
                        [
                            'title'          => 'Tin tức & Cập nhật',
                            'reference_id'   => 13,
                            'reference_type' => Category::class,
                            'parent_id'      => 0,
                        ],
                        [
                            'title'     => 'Thư viện ảnh',
                            'url'       => '/galleries',
                            'parent_id' => 0,
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 2,
                            'reference_type' => Page::class,
                            'parent_id'      => 0,
                        ],
                    ],
                ],

                [
                    'name'  => 'Trang web yêu thích',
                    'slug'  => 'trang-web-yeu-thich',
                    'items' => [
                        [
                            'title' => 'Speckyboy Magazine',
                            'url'   => 'http://speckyboy.com',
                        ],
                        [
                            'title' => 'Tympanus-Codrops',
                            'url'   => 'http://tympanus.com',
                        ],
                        [
                            'title' => 'Kipalog Blog',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'SitePoint',
                            'url'   => 'http://www.sitepoint.com',
                        ],
                        [
                            'title' => 'CreativeBloq',
                            'url'   => 'http://www.creativebloq.com',
                        ],
                        [
                            'title' => 'Techtalk',
                            'url'   => 'http://techtalk.vn',
                        ],
                    ],
                ],

                [
                    'name'  => 'Liên kết',
                    'slug'  => 'lien-ket',
                    'items' => [
                        [
                            'title' => 'Trang chủ',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 2,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Tin tức & Cập nhật',
                            'reference_id'   => 13,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Dự án',
                            'reference_id'   => 10,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title' => 'Thư viện ảnh',
                            'url'   => '/galleries',
                        ],
                    ],
                ],

                [
                    'name'  => 'Danh mục nổi bật',
                    'slug'  => 'danh-muc-noi-bat',
                    'items' => [
                        [
                            'title'          => 'Sự kiện',
                            'reference_id'   => 9,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Dự án',
                            'reference_id'   => 10,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Business',
                            'reference_id'   => 11,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Tin tức & Cập nhật',
                            'reference_id'   => 13,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Tài nguyên',
                            'reference_id'   => 14,
                            'reference_type' => Category::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Mạng xã hội',
                    'slug'  => 'mang-xa-hoi',
                    'items' => [
                        [
                            'title'     => 'Facebook',
                            'url'       => 'https://facebook.com',
                            'icon_font' => 'fa fa-facebook',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Twitter',
                            'url'       => 'https://twitter.com',
                            'icon_font' => 'fa fa-twitter',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Github',
                            'url'       => 'https://github.com',
                            'icon_font' => 'fa fa-github',
                            'target'    => '_blank',
                        ],

                        [
                            'title'     => 'Linkedin',
                            'url'       => 'https://linkedin.com',
                            'icon_font' => 'fa fa-linkedin',
                            'target'    => '_blank',
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::create([
                        'menu_id'  => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = md5($menuLocation->id . MenuLocation::class . time());

                    $languageMeta = LanguageMeta::where([
                        'reference_id'   => $locale == 'en_US' ? 1 : 2,
                        'reference_type' => MenuLocation::class,
                    ])->first();

                    if ($languageMeta) {
                        $originValue = $languageMeta->lang_meta_origin;
                    }

                    LanguageMeta::insert([
                        'reference_id'     => $menuLocation->id,
                        'reference_type'   => MenuLocation::class,
                        'lang_meta_code'   => $locale,
                        'lang_meta_origin' => $originValue,
                    ]);
                }

                foreach ($item['items'] as $menuNode) {
                    $menuNode['menu_id'] = $locale == 'en_US' ? $index + 1 : $index + 6;
                    MenuNode::create($menuNode);
                }

                $originValue = md5($menu->id . MenuModel::class . time());

                $languageMeta = LanguageMeta::where([
                    'reference_id'   => $index + 1,
                    'reference_type' => MenuModel::class,
                ])->first();

                if ($languageMeta) {
                    $originValue = $languageMeta->lang_meta_origin;
                }

                LanguageMeta::insert([
                    'reference_id'     => $menu->id,
                    'reference_type'   => MenuModel::class,
                    'lang_meta_code'   => $locale,
                    'lang_meta_origin' => $originValue,
                ]);
            }
        }

        Menu::clearCacheMenuItems();
    }
}
