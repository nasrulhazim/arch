<?php

namespace App\Traits;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * HasMediaExtended Trait.
 */
trait HasMediaExtended
{
    use HasMediaTrait;

    /**
     * Get the last media item of a media collection.
     *
     * @param string $collectionName
     * @param array  $filters
     *
     * @return Media|null
     */
    public function getLastMedia(string $collectionName = 'default', array $filters = [])
    {
        $media = $this->getMedia($collectionName, $filters);

        return $media->sortByDesc('created_at')->first();
    }

    /*
     * Get the url of the image for the given conversionName
     * for first media for the given collectionName.
     * If no profile is given, return the source's url.
     */
    public function getLastMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $media = $this->getLastMedia($collectionName);

        if (! $media) {
            return '';
        }

        return $media->getUrl($conversionName);
    }

    public function registerMediaConversions(Media $media = null)
    {
        // use for navbar
        $this->addMediaConversion('thumbnail_navbar')
            ->width(22)
            ->height(22)
            ->performOnCollections('images', 'avatar');

        // use for newsfeed
        $this->addMediaConversion('thumbnail_newsfeed')
            ->width(38)
            ->height(38)
            ->performOnCollections('images', 'avatar');

        // use for sidebar menus, left or right
        $this->addMediaConversion('thumbnail_sidebar')
            ->width(38)
            ->height(38)
            ->performOnCollections('images', 'avatar');

        // Use for main menu
        $this->addMediaConversion('thumbnail_menu')
            ->width(20)
            ->height(20)
            ->performOnCollections('images', 'avatar');
    }
}
