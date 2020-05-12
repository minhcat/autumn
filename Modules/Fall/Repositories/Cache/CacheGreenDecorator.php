<?php

namespace Modules\Fall\Repositories\Cache;

use Modules\Fall\Repositories\GreenRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGreenDecorator extends BaseCacheDecorator implements GreenRepository
{
    public function __construct(GreenRepository $green)
    {
        parent::__construct();
        $this->entityName = 'fall.greens';
        $this->repository = $green;
    }
}
