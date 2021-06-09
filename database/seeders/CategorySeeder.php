<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            'categories' => 'Flowering Plant(1 Seed Leaf)',
            'description' => 'Monocotyledons, commonly referred to as monocots, are grass and grass-like flowering plants, the seeds of which typically contain only one embryonic leaf, or cotyledon',
            'scientific_term' => 'Monocotyledon',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Flowering Plant(2 Seed Leaves)',
            'description' => 'The dicotyledons, also known as dicots, are one of the two groups into which all the flowering plants or angiosperms were formerly divided. The name refers to one of the typical characteristics of the group, namely that the seed has two embryonic leaves or cotyledons',
            'scientific_term' => 'Dicotyledon',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Flowering Plant(Ginkgo)',
            'description' => 'Ginkgo is a genus of highly unusual non-flowering seed plants. Planted as an ornamental. It is especially useful as a street tree as it is tolerant of city polluted air.',
            'scientific_term' => 'Ginkgophyta',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Flowering Plant(Cycads)',
            'description' => 'Cycads are seed plants with a very long fossil history that were formerly more abundant and more diverse than they are today. They typically have a stout and woody trunk with a crown of large, hard and stiff, evergreen leaves',
            'scientific_term' => 'Cycadophyta',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Flowering Plant(Conifers)',
            'description' => 'Conifers are a group of cone-bearing seed plants, a subset of gymnosperms, mostly trees plus a few shrubby species, they have either needle-like or scale-like leaves and most species are evergreen.',
            'scientific_term' => 'Pinophyta',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Spore-Producing(Club Moses)',
            'description' => 'Lycopodiopsida is a class of herbaceous vascular plants known as lycopods, most ancient group of vascular plants, They have shallow roots, and stems that sometimes scramble through the litter or, as rhizomes, radiate below ground.',
            'scientific_term' => 'Lycopodiopsida',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Spore-Producing(Horse-Tail)',
            'description' => 'Equisetidae is one of the four subclasses of Polypodiopsida, characteristically have whorled leaves and branches and conspicuously jointed stems, which in many cases are also ribbed. Reproductive structures are present in the form of greatly compressed stems called cones, or strobili, which form at the ends of branches.',
            'scientific_term' => 'Equisetum',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Spore-Producing(Fern)',
            'description' => 'A fern is a member of a group of vascular plants that reproduce via spores and have neither seeds nor flowers. They differ from mosses by being vascular, i.e., having specialized tissues that conduct water and nutrients and in having life cycles in which the sporophyte is the dominant phase.',
            'scientific_term' => 'Polypodiopsida',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Vascular(Liverworts)',
            'description' => 'The Marchantiophyta are a division of non-vascular land plants commonly referred to as hepatics or liverworts. Like mosses and hornworts, they have a gametophyte-dominant life cycle.',
            'scientific_term' => 'Marchantiophyta',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Vascular(Hornworts)',
            'description' => 'A hornwort is a flowerless, spore-producing plant - with the spores typically produced in a tapering, horn-like or needle-like capsule which develops from a flattish, green sheet',
            'scientific_term' => 'Anthocerotophyta',
            'isDeleted' => '0',
        ]);

        DB::table('categories')->insert([

            'categories' => 'Non-Vascular(Moss)',
            'description' => 'are a phylum of non-vascular plants. They produce spores for reproduction instead of seeds and do not grow flowers, wood or true roots. Instead of roots, all species of moss have rhizoids',
            'scientific_term' => 'Bryophyta',
            'isDeleted' => '0',
        ]);
    }
}
