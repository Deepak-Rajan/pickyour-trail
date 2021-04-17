<?php

namespace App\Repositories; 

use App\Models\TrailItem;
use Exception;

/**
 * TrailItem repository class
 */
class TrailItemRepository
{
    /**
     * Trail repository construct
     */
	public function __construct()
	{
		$this->setModel();
	}

    /**
     * Set a model
     */
	public function setModel() 
	{
		$this->model = new TrailItem();
	}

    /**
     * Get a model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Update a  trail item by id
     *
     * @param integer $id   Id of trail item
     * @param integer $cost Cost of a trail item
     * @return boolean
     */
    public function updateTrailItemById($id, $cost)
    {
        $trailItem = $this->getModel()->findorfail($id);

        // Update a item cost
        $trailItem->update(['cost' => $cost]);

        // To get a sum of cost
        $sumOfCost = $this->getModel()
            ->where('trail_id', '=', $trailItem->trail_id)
            ->get()
            ->sum('cost');

        // Update a total cost of trail
        $trailItem->trail->total_cost = $sumOfCost;
        if ($trailItem->trail->save()) {
            return true;
        }

        throw new Exception(__('trail.save_fail'));
    }
}
