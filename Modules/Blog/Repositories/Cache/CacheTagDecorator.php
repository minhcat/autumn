<?php

namespace Modules\Blog\Repositories\Cache;

use Modules\Blog\Repositories\TagRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTagDecorator extends BaseCacheDecorator implements TagRepository
{
    public function __construct(TagRepository $tag)
    {
        parent::__construct();
        $this->entityName = 'blog.tags';
        $this->repository = $tag;
    }
}
