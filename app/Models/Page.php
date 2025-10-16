<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_category_id',
        'slug',
        'title',
        'description',
        'hero_image',
        'hero_title',
        'hero_sub_title',
        'hero_description',
        'status',
        'type',
        'icon',
        'image',
        'route_name',
        'page_link_for',
        'order_no',
        'meta_tags',
        'meta_title',
        'meta_description',
    ];

    /**
     * Get a page by slug with all required relationships.
     *
     * @param  string  $slug
     * @return \App\Models\Page
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function findBySlugWithRelations(string $slug)
    {
        return self::with([
            'elements',
            'blocks',
            'sections',
            'infoSections',
            'callToActions',
            'sectionTitles',
            'faqs',
            'whyUsImages'
        ])->where('slug', $slug)->firstOrFail();
    }

    public function pageCategory()
    {
        return $this->belongsTo(PageCategory::class);
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }

    public function callToActions()
    {
        return $this->hasMany(CallToAction::class);
    }

    public function sectionTitles()
    {
        return $this->hasMany(SectionTitle::class);
    }

    public function introductionSections()
    {
        return $this->hasMany(IntroductionSection::class);
    }

    public function heroSections()
    {
        return $this->hasMany(HeroSection::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function whyChooseUs()
    {
        return $this->hasMany(WhyChooseUs::class);
    }

    public function documentRequireds()
    {
        return $this->hasMany(DocumentRequired::class);
    }

    public function whyUsImages()
    {
        return $this->hasMany(WhyUsImage::class);
    }

    public function featureImages()
    {
        return $this->hasMany(FeatureImage::class);
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function infoSections()
    {
        return $this->hasMany(InfoSection::class);
    }
}
