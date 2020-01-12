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

    /**
     * Register Media Conversion.
     *
     * @param \Spatie\MediaLibrary\Models\Media $media
     */
    public function registerMediaConversions(Media $media = null)
    {
        $dimensions = $this->getMediaDimensions();

        foreach ($dimensions as $dimension => $collection) {
            $this->addMediaConversion($collection)
                ->width($dimension)
                ->height($dimension)
                ->performOnCollections($collection);
        }
    }

    /**
     * List of dimension and it's collection name.
     */
    public function getMediaDimensions(): array
    {
        return [
            24  => 'avatar',
            32  => 'avatar',
            64  => 'avatar',
            128 => 'avatar',
            256 => 'avatar',
            512 => 'avatar',
        ];
    }
}
