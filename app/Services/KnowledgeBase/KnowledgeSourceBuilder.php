<?php

namespace App\Services\KnowledgeBase;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;

class KnowledgeSourceBuilder
{
    public function forProduct(Product $product): array
    {
        $text = implode("\n\n", array_filter([
            $product->name,
            $product->description,
            strip_tags((string) $product->clean_content),
        ]));

        return [
            'source_type' => 'product',
            'source_id' => "product:{$product->id}",
            'action' => 'upsert',
            'title' => $product->name,
            'url' => route('products.show', $product),
            'text' => $text,
            'updated_at' => optional($product->updated_at)->toIso8601String(),
        ];
    }

    public function forBlogPost(BlogPost $blogPost): array
    {
        $text = implode("\n\n", array_filter([
            $blogPost->title,
            $blogPost->excerpt,
            strip_tags((string) $blogPost->clean_content),
        ]));

        return [
            'source_type' => 'blog_post',
            'source_id' => "blog_post:{$blogPost->id}",
            'action' => 'upsert',
            'title' => $blogPost->title,
            'url' => $blogPost->url,
            'text' => $text,
            'updated_at' => optional($blogPost->updated_at)->toIso8601String(),
        ];
    }

    public function forCertification(Certification $certification): array
    {
        return [
            'source_type' => 'certification',
            'source_id' => "certification:{$certification->id}",
            'action' => 'upsert',
            'title' => $certification->name,
            'url' => route('accreditation.index'),
            'text' => $certification->name,
            'updated_at' => optional($certification->updated_at)->toIso8601String(),
        ];
    }

    public function forCompanyProfile(): array
    {
        $settings = Setting::current();

        $socialLinks = collect($settings->socialLinks())
            ->map(fn (array $link) => "{$link['label']}: {$link['url']}")
            ->implode(', ');

        $text = implode("\n", array_filter([
            config('app.name').' is a psyllium husk and dietary fiber manufacturer and exporter.',
            $settings->address ? "Address: {$settings->address}" : null,
            $settings->email ? "Email: {$settings->email}" : null,
            $settings->phone ? "Phone: {$settings->phone}" : null,
            $socialLinks ? "Social: {$socialLinks}" : null,
        ]));

        return [
            'source_type' => 'company_profile',
            'source_id' => 'company_profile:1',
            'action' => 'upsert',
            'title' => config('app.name'),
            'url' => route('home'),
            'text' => $text,
            'updated_at' => now()->toIso8601String(),
        ];
    }

    /**
     * The About Us page's founder/history/mission narrative is hardcoded
     * marketing copy in the blade template, not database content — so it
     * has to be captured here by hand rather than queried from a model.
     * If this copy changes on the About page, update it here too.
     */
    public function forAboutPage(): array
    {
        $countryCount = Country::query()->active()->count();

        $text = <<<TEXT
        Prime Psyllium has been a trusted psyllium manufacturer and supplier in India since 2018, built on decades of family expertise that goes back to 1995.

        Our founding patriarch is Haji NoorBhai KamalBhai Moriya. Our roots trace back to him beginning cultivating and trading seeds in the 1950s, laying the foundation of the family's legacy in agriculture. That legacy carries through four generations to Prime Psyllium.

        Company history timeline:
        - 1950s: Our great-grandfather, Haji NoorBhai KamalBhai Moriya, began cultivating and trading cumin seeds, expanding cultivation across 40 villages.
        - 1970: Our grandfather opened a trading shop in the Palanpur market yard under "M S Habibbhai Noorbhai Moriya," dealing in high-quality spices and grains.
        - 1995: The family entered psyllium husk production, starting with a small manufacturing unit processing one tonne a day.
        - 2012: We expanded into the spices sector, launching our Spices Ventures to diversify our product portfolio.
        - 2018: Prime Psyllium was founded under visionary leadership, with a mission to deliver premium-quality psyllium products globally.
        - 2019: We began exporting to international markets, marking the start of our global presence that now spans {$countryCount}+ countries.

        Every batch is sustainably processed and 100% naturally refined, backed by export-grade quality and consistent purity that meets international standards. The company has 30+ years of industry expertise and serves {$countryCount}+ countries worldwide.

        Our Mission: To support the health and well-being of our customers by offering hygienic, natural and premium-quality psyllium products at competitive prices.

        Our Vision: Long-term success comes from meaningful relationships built on trust, transparency and genuine care for our customers.

        Our Values: Integrity & Care (we act with honesty, responsibility and genuine care in every relationship), Highest Quality Standards (every batch is held to consistent, export-grade quality benchmarks), and Safe, Trusted Products (hygienic, certified processing you and your customers can rely on).
        TEXT;

        return [
            'source_type' => 'about_page',
            'source_id' => 'about_page:1',
            'action' => 'upsert',
            'title' => 'About Prime Psyllium',
            'url' => route('about.index'),
            'text' => $text,
            'updated_at' => now()->toIso8601String(),
        ];
    }

    public function deleteFor(string $sourceType, int|string $id): array
    {
        return [
            'source_type' => $sourceType,
            'source_id' => "{$sourceType}:{$id}",
            'action' => 'delete',
        ];
    }
}
