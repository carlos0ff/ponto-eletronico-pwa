<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * TimeRecord Model
 * @package Source\Models
 */
class TimeRecord extends Model
{
    public function __construct()
    {
        parent::__construct("time_records", ["id"], ["user_id", "clock_in"]);
    }
}