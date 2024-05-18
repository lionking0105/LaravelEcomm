<?php

namespace Modules\Billing\Service;

use Illuminate\Database\Eloquent\Model;
use Modules\Billing\Repository\WishlistRepository;
use Modules\Core\Service\CoreService;

class WishlistService extends CoreService
{

    public WishlistRepository $wishlist_repository;

    public function __construct(WishlistRepository $wishlist_repository)
    {
        parent::__construct($wishlist_repository);
    }

    /**
     * @return Model|null
     */
    public function getAll(): ?Model
    {
        $colum = "user_id";
        $value = auth()->user()->id;
        return $this->wishlist_repository->findBy($colum, $value);
    }


}
