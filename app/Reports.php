<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;

class Reports
{
    private $totalUsers;
    private $totalCategory;
    private $totalProduct;

    /**
     * @return integer
     */
    public function getTotalUsers()
    {
        if (is_null($this->totalUsers)) {
            $this->totalUsers = User::count();
        }

        return $this->totalUsers;
    }

    public function getTotalCategories()
    {
        if (is_null($this->totalCategory)) {
            $this->totalCategory = Category::count();
        }

        return $this->totalCategory;
    }

    public function getTotalProducts()
    {
        if (is_null($this->totalProduct)) {
            $this->totalProduct = Product::count();
        }

        return $this->totalProduct;
    }
}
