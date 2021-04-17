<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\TrailRepository;
use App\Repositories\TrailItemRepository;
use App\Http\Requests\TrailRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Traits\RESTActions;

/**
 * Trail controller class
 */
class TrailController extends Controller
{
    use RESTActions;

    /**
     * Trail repository
     */
    private $trailRepository;

    /**
     * Trail repository
     */
    private $trailItemRepository;

    /**
     * Construct of TrailController
     */
    public function __construct(TrailRepository $trailRepository, TrailItemRepository $trailItemRepository)
    {
        $this->trailRepository     = $trailRepository;
        $this->trailItemRepository = $trailItemRepository;
    }

    /**
     * Get trails
     *
     * @return JsonResponse Json response with message and data
     */
    public function getTrails()
    {
        try {
            $trails = $this->trailRepository->getAllTrail();
        } catch(\Exception $exception) {
            return response()->json([
                'status'  => 'error',
                'message' => $exception->getMessage(),
            ]);
        }

        return $this->respond(Response::HTTP_OK)->success([
            'status'  => 'success',
            'message' => __('trail.retreive_success'),
            'data'    => $trails
        ]);
    }

    /**
     * Create a new trail
     *
     * @params array $request Array of form values
     * @return JsonResponse Json response with message and data
     */
    public function createTrail(TrailRequest $request)
    {
        try {
            $trail = $this->trailRepository->createTrail($request);
        } catch(\Exception $exception) {
            return response()->json([
                'status'  => 'error',
                'message' => $exception->getMessage(),
            ]);
        }

        return $this->respond(Response::HTTP_OK)->success([
            'status'  => 'success',
            'message' => __('trail.success'),
        ]);
    }

    /**
     * Get a trail
     *
     * @param integer $id Id of trail
     * @return JsonResponse Json response with message and data
     */
    public function getTrail($id)
    {
        try {
            $trail = $this->trailRepository->getTrailById($id);
        } catch(\Exception $exception) {
            return response()->json([
                'status'  => 'error',
                'message' => $exception->getMessage(),
            ]);
        }

        return $this->respond(Response::HTTP_OK)->success([
            'status'  => 'success',
            'message' => __('trail.retreive_success'),
            'data'    => $trail
        ]);
    }

    /**
     * Uptate trail item by id
     *
     * @param integer $id Id of trail item
     * @return JsonResponse Json response with message and data
     */
    public function updateTrailItem($id, Request $request)
    {
        try {
            $trailItem = $this->trailItemRepository->updateTrailItemById($id, $request->cost);
        } catch(\Exception $exception) {
            return response()->json([
                'status'  => 'error',
                'message' => $exception->getMessage(),
            ]);
        }

        return $this->respond(Response::HTTP_OK)->success([
            'status'  => 'success',
            'message' => __('trail.update_success'),
        ]);
    }
}
