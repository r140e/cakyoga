<?php

namespace App\Helpers;

use Contentful\Delivery\Client as DeliveryClient;

class ContentfulQuery
{
    /**
     * @var DeliveryClient
     */
    private $client;

    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function getEntriesIndex($contentType, $limit = -1)
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType($contentType)
            ->orderBy('sys.updatedAt')
            ->setInclude(2)
            ->setLimit(6);

        return $this->client->getEntries($query);
    }

    public function getEntriesByContentType($contentType, $limit = -1)
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType($contentType)
            ->orderBy('sys.updatedAt')
            ->setInclude(2);

        if ($limit > 0) {
            $query->setLimit($limit);
        }

        return $this->client->getEntries($query);
    }

    public function getEntry($contentType, $slug)
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType($contentType)
            ->where('fields.slug', $slug);

        try {
            $results = $this->client->getEntries($query);

            if (count($results) <= 0) {
                return null;
            } else {
                return $results[0];
            }
        } catch (\Contentful\Core\Exception\NotFoundException $exception) {
            return null;
        } catch (\Contentful\Core\Exception\BadRequestException $exception) {
            return null;
        }
    }

    public function getAsset($asset_id)
    {
        try {
            $asset = $this->client->getAsset($asset_id);
            return $asset;
        } catch (\Contentful\Core\Exception\NotFoundException $exception) {
            return null;
        } catch (Exception $ex) {
            return null;
        }
    }

    public function getKegiatan($kategori, $limit = -1)
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType('kegiatan')
            ->where('fields.kategori', $kategori)
            ->orderBy('fields.urutanKegiatan')
            ->setInclude(2);

        if ($limit > 0) {
            $query->setLimit($limit);
        }

        return $this->client->getEntries($query);
    }

    public function getHasil($tags, $limit = -1)
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType('hasil')
            ->where('fields.tags', $tags)
            ->setInclude(2);

        if ($limit > 0) {
            $query->setLimit($limit);
        }

        return $this->client->getEntries($query);
    }
}
