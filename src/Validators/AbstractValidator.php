<?php

namespace Tymon\JWTAuth\Validators;

use Carbon\Carbon;
use Tymon\JWTAuth\Exceptions\JWTException;

abstract class AbstractValidator implements ValidatorInterface
{

    /**
     * @var bool
     */
    protected $refreshFlow = false;

    /**
     * Helper function to return a boolean
     *
     * @param  array  $value
     * @return bool
     */
    public function isValid($value)
    {
        try {
            $this->check($value);
        } catch (JWTException $e) {
            return false;
        }

        return true;
    }

    /**
     * Set the refresh flow flag
     *
     * @param  bool  $refreshFlow
     * @return $this
     */
    public function setRefreshFlow($refreshFlow = true)
    {
        $this->refreshFlow = $refreshFlow;

        return $this;
    }

    /**
     * Get the Carbon instance for the timestamp
     *
     * @param  int  $ts
     * @return \Carbon\Carbon
     */
    protected function carbon($ts)
    {
        return Carbon::createFromTimeStamp($ts);
    }
}
