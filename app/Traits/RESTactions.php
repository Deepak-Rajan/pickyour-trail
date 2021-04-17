<?php namespace App\Traits;

trait RESTActions
{
    /**
     * Status code
     *
     * @var integer
     */
    protected $statusCode;

    /**
     * Get a status code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set a status code
     *
     * @param integer $code Status code
     */
    public function setStatusCode($code)
    {
        $this->statusCode = $code;
    }

    /**
     * Set status code and return respose of current object
     *
     * @param integer $code Status code
     * @return object
     */
    protected function respond($status = 200)
    {
        $this->statusCode = $status;

        return $this;

    }

    /**
     * Set success message
     */
    private function success($error = [])
    {
        return $this->response($error);
    }

    /**
     * Response of an array in Json
     */
    private function response($error = [])
    {
        return response()->json($error, $this->statusCode);
    }

    /**
     * Set error message
     */
    private function error($error = [])
    {
        return $this->response($error);
    }
}
