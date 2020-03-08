<?php

use Illuminate\Database\Seeder;

use App\Models\Tag as TagModel;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new TagModel();
        $tag1->name = "hardware, software, and interactive services";
        $tag1->save();

        $tag2 = new TagModel();
        $tag2->name = "remote visual communications";
        $tag2->save();

        $tag3 = new TagModel();
        $tag3->name = "social enterprise management";
        $tag3->save();

        $tag4 = new TagModel();
        $tag4->name = "cybersecurity and forensics";
        $tag4->save();

        $tag5 = new TagModel();
        $tag5->name = "3D printing";
        $tag5->save();

        $tag6 = new TagModel();
        $tag6->name = "VR, AR & MR";
        $tag6->save();

        $tag7 = new TagModel();
        $tag7->name = "cloud services and virtualization";
        $tag7->save();

        $tag8 = new TagModel();
        $tag8->name = "big data";
        $tag8->save();

        $tag9 = new TagModel();
        $tag9->name = "AI & machine learning";
        $tag9->save();

        $tag10 = new TagModel();
        $tag10->name = "3D web";
        $tag10->save();

        $tag11 = new TagModel();
        $tag11->name = "intelligent sensors and machines";
        $tag11->save();

        $tag12 = new TagModel();
        $tag12->name = "robotics and automation";
        $tag12->save();
    }
}
