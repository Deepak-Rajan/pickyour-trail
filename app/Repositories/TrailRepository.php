<?php

namespace App\Repositories; 

use App\Models\Trail;
use Exception;

/**
 * Trail repository class
 */
class TrailRepository
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
		$this->model = new Trail();
	}

    /**
     * Get a model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get all trails
     *
     * @return Trail
     */
    public function getAllTrail()
    {
        $trails = $this->getModel()->all();

        if (empty($trails)) {
            throw new Exception(__('trail.no_record_found'));
        }

        return $trails;
	}

    /**
     * Add or create a trail
     *
     * @param array Array of request params
     * @return boolean
     */
    public function createTrail($request)
    {
        $trail = $this->getModel();

        $trail->customer_id = $request->customer_id;
        $trail->trail_to    = $request->trail_to;
        $trail->flying_from = $request->flying_from;
        $trail->total_cost  = $request->total_cost;

        if ($trail->save()) {
            return true;
        }

        throw new Exception(__('trail.save_fail'));
    }

    /**
     * Get trail by id
     *
     * @param integer $id Id of trail
     * @return Trail
     */
    public function getTrailById($id)
    {
        $trail = $this->getModel()->with('trailItems')->find($id);

        if (empty($trail)) {
            throw new Exception(__('trail.no_record_found'));
        }

        return $trail;
    }
}
