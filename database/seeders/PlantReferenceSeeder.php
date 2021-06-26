<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Orchidaceae',
            'plant_description' => 'The Orchidaceae are a diverse and widespread family of flowering plants, with blooms that are often colourful and fragrant, commonly known as the orchid family. Along with the Asteraceae, they are one of the two largest families of flowering plants.',
            'plant_maintenance'=> 'Orchids need to be fed regularly. Growers suggest using a "balanced" fertilizer such as 20-20-20 that includes all "necessary trace elements." Regardless of the fertilizer formulation you choose to use, it should contain little or no urea.',
            'plant_categoryid' => 1,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Helianthus',
            'plant_description' => 'Helianthus or Sunflower is a genus comprising about 70 species of annual and perennial flowering plants in the daisy family Asteraceae. Except for three South American species, the species of Helianthus are native to North America and Central America.',
            'plant_maintenance'=> 'Although sunflowers are drought and heat tolerant, they still require frequent watering. As the plant begins to grow, it will need to be watered around the root zone, which is 3–4 inches away from the stem. Sunflower seedlings should be watered daily so the soil is moist but not soaked',
            'plant_categoryid' => 2,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
        
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Cycas rumphii',
            'plant_description' => 'Cycas rumphii, commonly known as queen sago or the queen sago palm, is a dioecious gymnosperm, a species of cycad in the genus Cycas native to Indonesia, New Guinea and Christmas Island. Although palm-like in appearance, it is not a palm.',
            'plant_maintenance'=> 'revoluta grows at its best with bright light, without direct sunlight. Watering: The soil is best kept moist, so water once the soil begins to dry slightly at the top. Over-watering or watering at the crown of the plant can cause the plant to rot.',
            'plant_categoryid' => 3,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);

        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Asplenium nidus',
            'plant_description' => 'Also known as the Birds-nest fern, Asplenium nidus is an epiphytic species of fern in the family Aspleniaceae, native to tropical southeastern Asia, eastern Australia, Hawaii, Polynesia, Christmas Island, India, and eastern Africa. It is known by the common names birds-nest fern or simply nest fern.',
            'plant_maintenance'=> 'To care for Asplenium nidus houseplants, place in an area of the home with indirect or shady light. Asplenium nidus prefer evenly moist surroundings. Watering the soil often during growth and housing the plant in a moderately humid area will help to maintain a healthy environment during care for Birds Nest Fern.',
            'plant_categoryid' => 4,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Haplomitriales',
            'plant_description' => 'Haplomitriales is an order of plants known as liverworts. The order is also called Calobryales in some sources, but the genus Calobryum is a synonym for Haplomitrium. This order contains one family, Haplomitriaceae, with a single extant genus Haplomitrium.',
            'plant_maintenance'=> 'Liverwort plants is a type of plant that will require a large quantity of water. When grown submerged it will not need to be watered. The plant will be able to absorb as much water and nutrients as it needs on its own. Unlike Crystalwort or most mosses, Liverwort will not benefit from a steady water flow.',
            'plant_categoryid' => 5,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Phaeoceros laevis',
            'plant_description' => 'Phaeoceros laevis of Anthocerotophyta Species, the smooth hornwort, is a species of hornwort of the genus Phaeoceros. It is commonly found in areas where moisture is plentiful, such as moist soils in fields, the banks of streams and rivers or inundated beneath the surface of the rivers',
            'plant_maintenance'=> 'Moss Type Plants is often considered a weed in grass lawns, but is deliberately encouraged to grow under aesthetic principles exemplified by Japanese gardening.',
            'plant_categoryid' => 6,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
        DB::table('plant_referencepages')->insert([
            'plant_scientificname' => 'Taxiphyllum barbieri',
            'plant_description' => 'Also know as java moss, Native to southeast Asia, it is commonly used in freshwater aquariums. It attaches to rocks, roots, and driftwood. The identity of this well-known plant is not resolved; formerly thought to be Vesicularia dubyana (Brotherus, 1908),',
            'plant_maintenance'=> 'Java moss does not require any special attention. It accepts all kinds of water, even weakly brackish, and all kinds of light qualities. It grows best at 70 to 75° Fahrenheit (21 to 24° Celsius), but can live in temperatures of up to 85 to 90 °F (29 to 32 °C). It makes a good foreground plant. In aquariums it should be planted where there is good water current because debris gets stuck on it easily and gives it a brown fuzzy appearance. ',
            'plant_categoryid' => 7,
            'plant_photo' => 'product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg',
            // 'keyword_id',
            'isDeleted' => 0,

        ]);
    
    }
}
