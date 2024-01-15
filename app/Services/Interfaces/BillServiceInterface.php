<?php

namespace App\Services\Interfaces;

/**
 * Interface BillServiceInterface
 * @package App\Services\Interfaces
 */
interface BillServiceInterface
{
    public function product($id);
    public function all();

    public function get_bill($status_bill);
    public function search($request);
    public function update($request);
    public function get_revenue();
    public function get_quantity($status_bill);
}
