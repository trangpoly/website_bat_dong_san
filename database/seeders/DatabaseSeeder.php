<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userSeed = [];
        $cateRealtySeed = [];
        $realtySeed = [];
        $bannerSeed = [];
        $cateNewSeed = [];
        $newSeed = [];

        for($i=1; $i<11; $i++){
            $userSeed[] = [
                "name" => "Phạm Poly",
                "email" => "poly$i@gmail.com",
                "password" => "123456",
                "avatar" => "https://www.pngall.com/wp-content/uploads/12/Avatar-Profile.png",
                "address" => "Hà Nội",
                "role" => 0,
                "status" => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $cateRealtySeed[] = [
                            "title" => "Loại BĐS số $i",
                            "image" => "https://bizweb.dktcdn.net/thumb/large/100/328/080/products/can-ho-the-prince-residence-phu-nhuan-1.jpg?v=1536309913243",
                            "status" => 0,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

            $realtySeed[] = [
                "title" => "Bất động sản số $i",
                "price" => 200000000,
                "bed" => 3,
                "bath" => 2,
                "phone" => "0123456789",
                "address" => "Hà Nội",
                "email" => "bds$i@gmail.com",
                "short_desc" => "Điểm bất lợi của ngôi nhà phố đẹp 3 tầng này là có mặt tiền hướng tây, thường làm cho ngôi nhà của bạn có cảm giác như đang bị nung nóng bởi một bếp lò khổng lồ của những tia nắng mặt trời chiếu rọi.",
                "desc" => "Điểm bất lợi của ngôi nhà phố đẹp 3 tầng này là có mặt tiền hướng tây, thường làm cho ngôi nhà của bạn có cảm giác như đang bị nung nóng bởi một bếp lò khổng lồ của những tia nắng mặt trời chiếu rọi.",
                "photo_gallery" => '[
                    "https://bizweb.dktcdn.net/thumb/1024x1024/100/328/080/products/16.jpg?v=1534254237630",
                    "https://bizweb.dktcdn.net/thumb/1024x1024/100/328/080/products/ss.png?v=1534254242320",
                    "https://bizweb.dktcdn.net/100/328/080/products/2a6b6f5c3983a4f979910978d28ec7-863b57ec-7edc-495f-bf32-a0bb14cf8797.jpg?v=1534254242320"
                ]',
                "image" => "https://bizweb.dktcdn.net/100/328/080/products/15.jpg?v=1534254237630",
                "in_stock" => 0,
                "status" => 0,
                "category_realty_id" => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];
            
            $bannerSeed[] = [
                "title" => "Banner $i",
                "image" => "https://bizweb.dktcdn.net/100/328/080/themes/679625/assets/slider_1.png?1650598682225",
                "desc" => "Hello Word!",
                "status" => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $cateNewSeed[] = [
                            "title" => "Danh mục tin tức $i",
                            "image" => "https://bizweb.dktcdn.net/thumb/1024x1024/100/328/080/products/16.jpg?v=1534254237630",
                            "status" => 0,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

            $newSeed[] = [
                "title" => "Tin tức số $i",
                "image" => "https://bizweb.dktcdn.net/thumb/1024x1024/100/328/080/products/16.jpg?v=1534254237630",
                "content" => "Nội dung tin tức số $i",
                "status" => 0,
                "category_new_id" => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        DB::table('users')->insert($userSeed);
        DB::table('categories_realty')->insert($cateRealtySeed);
        DB::table('realty')->insert($realtySeed);
        DB::table('banners')->insert($bannerSeed);
        DB::table('categories_new')->insert($cateNewSeed);
        DB::table('news')->insert($newSeed);
    }
}
