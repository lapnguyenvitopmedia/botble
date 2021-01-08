<?php

use Botble\Media\Models\MediaFile;
use Botble\Media\Models\MediaFolder;
use Botble\Setting\Models\Setting as SettingModel;
use Illuminate\Database\Seeder;
use Mimey\MimeTypes;

class ThemeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folder = 'general';
        File::deleteDirectory(config('filesystems.disks.public.root') . '/' . $folder);
        MediaFile::where('url', 'LIKE', $folder . '/%')->forceDelete();
        MediaFolder::where('name', $folder)->forceDelete();

        $mimeType = new MimeTypes;
        foreach (File::allFiles(database_path('seeds/files/' . $folder)) as $file) {
            $type = $mimeType->getMimeType(File::extension($file));
            RvMedia::uploadFromPath($file, 0, $folder, $type);
        }

        foreach (scan_folder(theme_path()) as $theme) {
            SettingModel::where('key', 'LIKE', 'theme-' . $theme . '-%')->delete();

            $data = [
                'en_US' => [
                    [
                        'key'   => 'theme-' . $theme . '-site_title',
                        'value' => 'Just another Botble CMS site',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-copyright',
                        'value' => '©' . now()->format('Y') . ' Botble Technologies. All right reserved.',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-favicon',
                        'value' => 'general/favicon.png',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-website',
                        'value' => 'https://botble.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-contact_email',
                        'value' => 'support@botble.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-site_description',
                        'value' => 'With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-phone',
                        'value' => '+(123) 345-6789',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-address',
                        'value' => '214 West Arnold St. New York, NY 10002',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-facebook',
                        'value' => 'https://facebook.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-twitter',
                        'value' => 'https://twitter.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-youtube',
                        'value' => 'https://youtube.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-top_banner',
                        'value' => 'general/728x90.jpg',
                    ],
                ],

                'vi' => [
                    [
                        'key'   => 'theme-' . $theme . '-vi-site_title',
                        'value' => 'Một trang web sử dụng Botble CMS',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-copyright',
                        'value' => '©' . now()->format('Y') . ' Botble Technologies. Tất cả quyền đã được bảo hộ.',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-favicon',
                        'value' => 'general/favicon.png',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-website',
                        'value' => 'https://botble.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-contact_email',
                        'value' => 'support@botble.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-site_description',
                        'value' => 'Với kinh nghiệm dồi dào, chúng tôi đảm bảo hoàn thành mọi dự án rất nhanh và đúng thời gian với chất lượng cao sử dụng Botble CMS của chúng tôi https://1.envato.market/LWRBY',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-phone',
                        'value' => '+(123) 345-6789',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-address',
                        'value' => '214 West Arnold St. New York, NY 10002',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-facebook',
                        'value' => 'https://facebook.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-twitter',
                        'value' => 'https://twitter.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-youtube',
                        'value' => 'https://youtube.com',
                    ],
                    [
                        'key'   => 'theme-' . $theme . '-vi-top_banner',
                        'value' => 'general/728x90.jpg',
                    ],
                ],
            ];

            foreach ($data as $items) {
                SettingModel::insertOrIgnore($items);
            }
        }

        SettingModel::insertOrIgnore([
            'key'   => 'theme-ripple-logo',
            'value' => 'general/ripple-logo.png',
        ]);

        SettingModel::insertOrIgnore([
            'key'   => 'theme-newstv-logo',
            'value' => 'general/newstv-logo.png',
        ]);
    }
}
