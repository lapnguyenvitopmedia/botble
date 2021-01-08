<?php

use Botble\Media\Models\MediaFile;
use Botble\Media\Models\MediaFolder;
use Botble\Widget\Models\Widget as WidgetModel;
use Illuminate\Database\Seeder;
use Mimey\MimeTypes;

class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetModel::truncate();

        $folder = 'widgets';
        File::deleteDirectory(config('filesystems.disks.public.root') . '/' . $folder);
        MediaFile::where('url', 'LIKE', $folder . '/%')->forceDelete();
        MediaFolder::where('name', $folder)->forceDelete();

        $mimeType = new MimeTypes;
        foreach (File::allFiles(database_path('seeds/files/' . $folder)) as $file) {
            $type = $mimeType->getMimeType(File::extension($file));
            RvMedia::uploadFromPath($file, 0, $folder, $type);
        }

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Categories',
                        'menu_id' => 'featured-categories',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Social',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Favorite Websites',
                        'menu_id' => 'favorite-websites',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'My Links',
                        'menu_id' => 'my-links',
                    ],
                ],
            ],
            'vi'    => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Bài viết gần đây',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Bài viết gần đây',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Danh mục nổi bật',
                        'menu_id' => 'danh-muc-noi-bat',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Mạng xã hội',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Trang web yêu thích',
                        'menu_id' => 'trang-web-yeu-thich',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Liên kết',
                        'menu_id' => 'lien-ket',
                    ],
                ],
            ],
        ];

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? 'ripple' : ('ripple-' . $locale);
                WidgetModel::create($item);
            }
        }

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'PopularPostsWidget',
                        'name'           => 'Top Views',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'VideoPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'VideoPostsWidget',
                        'name'           => 'Video posts',
                        'number_display' => 1,
                    ],
                ],
                [
                    'widget_id'  => 'FacebookWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'            => 'FacebookWidget',
                        'name'          => '',
                        'facebook_name' => 'Botble Technologies',
                        'facebook_id'   => 'https://www.facebook.com/botble.technologies',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'         => 'AdsWidget',
                        'name'       => '',
                        'image_url'  => RvMedia::getImageUrl('widgets/300x250.jpg'),
                        'image_link' => 'https://google.com',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Favorite Websites',
                        'menu_id' => 'favorite-websites',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'My Links',
                        'menu_id' => 'my-links',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Featured categories',
                        'menu_id' => 'featured-categories',
                    ],
                ],
            ],
            'vi'    => [
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'PopularPostsWidget',
                        'name'           => 'Bài viết nổi bật',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'VideoPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'VideoPostsWidget',
                        'name'           => 'Bài viết video',
                        'number_display' => 1,
                    ],
                ],
                [
                    'widget_id'  => 'FacebookWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'            => 'FacebookWidget',
                        'name'          => '',
                        'facebook_name' => 'Botble Technologies',
                        'facebook_id'   => 'https://www.facebook.com/botble.technologies',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'         => 'AdsWidget',
                        'name'       => '',
                        'image_url'  => RvMedia::getImageUrl('widgets/300x250.jpg'),
                        'image_link' => 'https://google.com',
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Bài viết gần đây',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Trang web yêu thích',
                        'menu_id' => 'trang-web-yeu-thich',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Liên kết',
                        'menu_id' => 'lien-ket',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Danh mục nổi bật',
                        'menu_id' => 'danh-muc-noi-bat',
                    ],
                ],
            ],
        ];

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? 'newstv' : ('newstv-' . $locale);
                WidgetModel::create($item);
            }
        }
    }
}
