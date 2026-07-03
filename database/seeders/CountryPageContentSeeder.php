<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryPageContentSeeder extends Seeder
{
    /**
     * Seed detail-page content for the countries that had a dedicated
     * landing page on the old site. Safe to re-run — always updates by name.
     */
    public function run(): void
    {
        foreach ($this->pages() as $name => $data) {
            Country::query()->where('name', $name)->update(array_merge($data, [
                'has_page' => true,
            ]));
        }
    }

    private function pages(): array
    {
        return [
            'USA' => [
                'slug' => 'usa',
                'cities' => ['New York', 'Houston', 'Dallas', 'Seattle', 'Los Angeles', 'Miami', 'Boston', 'Atlanta', 'Chicago', 'San Francisco'],
                'intro_content' => '<p>Prime Psyllium is a trusted psyllium husk manufacturer and exporter from India, supplying nutraceutical brands, supplement manufacturers and food producers across the United States. We specialize in bulk supply built around export-grade purity, hygienic processing and packaging tailored to US import requirements.</p>',
                'market_demand_content' => '<p>Demand for natural dietary fiber continues to grow across the US health and wellness market. Our psyllium products are formulated into:</p><ul><li>Fiber supplements and digestive health capsules</li><li>Colon health and detox formulations</li><li>Weight management products</li><li>Gluten-free baked goods</li><li>Functional beverages and drink mixes</li></ul>',
                'export_capability_content' => '<p>We support US importers with bulk container shipments, customized packaging formats, private label options and long-term supply agreements — giving supplement and food manufacturers a dependable, scalable source of psyllium.</p>',
                'quality_standards_content' => '<p>Every batch is processed in an FSSC 22000 certified facility using advanced cleaning systems and controlled environments. Hygienic packaging and consistent purity levels ensure our products meet the standards US importers expect.</p>',
                'export_logistics_content' => '<p>We coordinate FOB and CIF shipments to major US ports, with full documentation support and reliable scheduling for consistent delivery to distributors and manufacturers nationwide.</p>',
                'faqs' => [
                    ['question' => 'Which industries import psyllium husk in the USA?', 'answer' => 'Nutraceutical companies, dietary supplement brands, food manufacturers and specialty ingredient distributors are our primary US customers.'],
                    ['question' => 'Why do US companies source psyllium from India?', 'answer' => 'India is the world\'s largest psyllium-growing region, giving Indian exporters like Prime Psyllium consistent access to high-quality raw material at competitive, stable pricing.'],
                    ['question' => 'Is bulk supply available for large-scale manufacturing?', 'answer' => 'Yes. We ship in bulk container quantities and can structure long-term supply agreements to support ongoing production needs.'],
                    ['question' => 'What forms of psyllium do you export?', 'answer' => 'We supply psyllium seed, husk, husk powder, seed powder and khakha powder — covering the full range used across supplement and food applications.'],
                    ['question' => 'Can we request product samples before ordering?', 'answer' => 'Yes, samples are available on request so you can verify purity, particle size and swell quality before placing a bulk order.'],
                    ['question' => 'Do you offer private label packaging for the US market?', 'answer' => 'Yes, we offer custom private label and export-ready packaging formats tailored to your brand and import requirements.'],
                ],
            ],
            'Canada' => [
                'slug' => 'canada',
                'cities' => ['Toronto', 'Vancouver', 'Montreal', 'Calgary', 'Ottawa', 'Edmonton', 'Winnipeg'],
                'intro_content' => '<p>Prime Psyllium is a reliable psyllium manufacturer and exporter from India, supplying Canadian nutraceutical brands and food manufacturers with dietary fiber ingredients built on export-grade purity and consistent quality.</p>',
                'market_demand_content' => '<p>Canada\'s health and wellness sector continues to embrace natural fiber ingredients. Our psyllium range supports:</p><ul><li>Fiber supplements and digestive health products</li><li>Functional food formulations</li><li>Gluten-free bakery products</li><li>Nutraceutical capsules and powders</li><li>Health and wellness beverages</li></ul>',
                'export_capability_content' => '<p>We support Canadian importers with bulk container shipments, flexible packaging formats, private label support and long-term partnership agreements designed for consistent, scalable supply.</p>',
                'quality_standards_content' => '<p>Our facility runs on advanced processing technology with rigorous quality inspection, hygienic manufacturing practices and consistent grading — so every shipment meets the standard Canadian importers expect.</p>',
                'export_logistics_content' => '<p>We coordinate delivery to major Canadian cities including Toronto, Vancouver, Montreal, Calgary, Ottawa, Edmonton and Winnipeg, with full export documentation and reliable shipment scheduling.</p>',
                'faqs' => [
                    ['question' => 'Is psyllium husk popular in the Canadian health and wellness market?', 'answer' => 'Yes, psyllium husk is widely used as a soluble fiber source in supplements and functional foods across Canada.'],
                    ['question' => 'Which industries in Canada typically import psyllium products?', 'answer' => 'Nutraceutical companies, supplement brands, food manufacturers and ingredient distributors are our main Canadian customers.'],
                    ['question' => 'Do Canadian supplement manufacturers use psyllium in fiber formulations?', 'answer' => 'Yes, it\'s commonly used in capsules, powders, digestive supplements and weight management products.'],
                    ['question' => 'What packaging options are available for psyllium exports to Canada?', 'answer' => 'We offer bulk export packaging suited to large-scale manufacturing, along with private label options on request.'],
                    ['question' => 'Can psyllium be used in gluten-free food products in Canada?', 'answer' => 'Yes, its binding and fiber properties make it a popular ingredient in gluten-free baking.'],
                    ['question' => 'Do you support long-term supply for Canadian importers?', 'answer' => 'Yes, we work with Canadian partners on long-term supply agreements to ensure consistent, reliable delivery.'],
                ],
            ],
            'Brazil' => [
                'slug' => 'brazil',
                'cities' => ['São Paulo', 'Rio de Janeiro', 'Brasília', 'Curitiba', 'Porto Alegre', 'Belo Horizonte', 'Campinas'],
                'intro_content' => '<p>Prime Psyllium is a trusted psyllium manufacturer and exporter from India, focused on supplying Brazil\'s growing nutraceutical and food manufacturing sector with export-grade, naturally processed psyllium.</p>',
                'market_demand_content' => '<p>Brazil\'s health and wellness sector is expanding rapidly, with rising demand for natural fiber ingredients across:</p><ul><li>Dietary supplements</li><li>Functional food formulations</li><li>Digestive health products</li><li>Gluten-free products</li><li>Nutritional beverages</li></ul>',
                'export_capability_content' => '<p>We support Brazilian importers with bulk shipments, custom packaging, consistent supply schedules and long-term partnership support for nutraceutical, pharmaceutical and food industry buyers.</p>',
                'quality_standards_content' => '<p>Our processing runs through advanced cleaning systems, controlled environments, thorough inspection procedures and hygienic packaging — ensuring consistent purity for every shipment to Brazil.</p>',
                'export_logistics_content' => '<p>We coordinate shipments to major Brazilian cities including São Paulo, Rio de Janeiro, Curitiba and Belo Horizonte, with export documentation handled for smooth customs clearance.</p>',
                'faqs' => [
                    ['question' => 'Is psyllium husk used in the Brazilian food industry?', 'answer' => 'Yes, it\'s widely used in functional foods and gluten-free products across Brazil.'],
                    ['question' => 'What is driving psyllium\'s popularity in Brazil?', 'answer' => 'Growing awareness of digestive health and natural fiber ingredients is fueling demand across the supplement and food sectors.'],
                    ['question' => 'Do Brazilian companies import psyllium in bulk?', 'answer' => 'Yes, supplement manufacturers and food companies regularly import psyllium in bulk for capsules, powders and functional formulations.'],
                    ['question' => 'Which Brazilian cities show the highest demand?', 'answer' => 'São Paulo, Rio de Janeiro, Curitiba and Belo Horizonte are among the highest-demand markets we serve.'],
                    ['question' => 'Can psyllium be used in functional foods?', 'answer' => 'Yes, its fiber content and natural binding properties make it well suited to functional food formulations.'],
                    ['question' => 'Do you supply food processors as well as supplement brands?', 'answer' => 'Yes, we supply food processors, supplement manufacturers and ingredient distributors across Brazil.'],
                ],
            ],
            'Russia' => [
                'slug' => 'russia',
                'cities' => ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Yekaterinburg', 'Kazan', 'Nizhny Novgorod'],
                'intro_content' => '<p>Prime Psyllium is an Indian exporter supplying high-quality psyllium products to international markets including Russia, serving nutraceutical, pharmaceutical and food manufacturers with export-grade, naturally processed fiber ingredients.</p>',
                'market_demand_content' => '<p>Russian demand for psyllium continues to grow across several categories, including fiber supplements, nutraceuticals, pharmaceutical formulations and functional foods.</p>',
                'export_capability_content' => '<p>We support Russian importers with bulk shipments, flexible packaging options and dependable supply partnerships built for consistent, long-term sourcing.</p>',
                'quality_standards_content' => '<p>Advanced processing technology, thorough inspection and hygienic packaging ensure every batch we export to Russia meets consistent purity and quality standards.</p>',
                'export_logistics_content' => '<p>We manage documentation and delivery coordination for shipments to major Russian cities including Moscow, Saint Petersburg, Novosibirsk, Yekaterinburg, Kazan and Nizhny Novgorod.</p>',
                'faqs' => [
                    ['question' => 'Is psyllium husk used in digestive health products in Russia?', 'answer' => 'Yes, it\'s a popular soluble fiber ingredient in digestive health supplements across the Russian market.'],
                    ['question' => 'Which industries in Russia use psyllium products?', 'answer' => 'Nutraceutical, pharmaceutical and functional food manufacturers are the main industries importing psyllium in Russia.'],
                    ['question' => 'Why do Russian companies source psyllium from India?', 'answer' => 'India offers consistent raw material availability, competitive pricing and export-grade processing standards that Russian importers rely on.'],
                    ['question' => 'Is psyllium used in pharmaceutical applications?', 'answer' => 'Yes, its fiber and binding properties make it useful in laxative formulations and other pharmaceutical products.'],
                    ['question' => 'Do you support bulk import practices for Russian buyers?', 'answer' => 'Yes, we supply in bulk container quantities with flexible packaging to suit different import volumes.'],
                    ['question' => 'Which Russian cities have the highest demand?', 'answer' => 'Moscow, Saint Petersburg and Novosibirsk are among the largest markets we serve in Russia.'],
                ],
            ],
            'South Korea' => [
                'slug' => 'south-korea',
                'cities' => ['Seoul', 'Busan', 'Incheon', 'Daegu', 'Daejeon', 'Gwangju', 'Suwon'],
                'intro_content' => '<p>Prime Psyllium is an Indian exporter serving South Korea\'s growing health and wellness market with bulk, export-grade psyllium supplies for manufacturers and distributors.</p>',
                'market_demand_content' => '<p>South Korean consumers are showing rising preference for functional foods that support digestive health and general wellness, driving steady demand for psyllium-based ingredients.</p>',
                'export_capability_content' => '<p>We offer bulk shipment capacity, flexible packaging and reliable, ongoing supply to South Korean manufacturers and distributors of nutraceutical and functional food products.</p>',
                'quality_standards_content' => '<p>Advanced processing, strict hygiene protocols and thorough inspection procedures ensure consistent quality across every shipment to South Korea.</p>',
                'export_logistics_content' => '<p>We coordinate shipment delivery to major South Korean cities including Seoul, Busan, Incheon, Daegu, Daejeon, Gwangju and Suwon, with full export documentation support.</p>',
                'faqs' => [
                    ['question' => 'Is psyllium used in functional foods in South Korea?', 'answer' => 'Yes, it\'s increasingly used in functional food formulations that support digestive health.'],
                    ['question' => 'What is driving psyllium\'s popularity in the South Korean wellness market?', 'answer' => 'Rising consumer interest in natural fiber and digestive wellness products is the main driver of demand.'],
                    ['question' => 'Which industries import psyllium in South Korea?', 'answer' => 'Nutraceutical manufacturers, food companies and ingredient distributors are our primary customers in South Korea.'],
                    ['question' => 'Can psyllium be used in beverages and powders?', 'answer' => 'Yes, it\'s used in functional beverages, drink mixes and powdered supplement formats.'],
                    ['question' => 'Do you support bulk importing for South Korean manufacturers?', 'answer' => 'Yes, we supply bulk container quantities with flexible packaging suited to different production scales.'],
                    ['question' => 'Which South Korean cities have the highest demand?', 'answer' => 'Seoul, Busan and Incheon are among the largest markets we currently serve.'],
                ],
            ],
        ];
    }
}
