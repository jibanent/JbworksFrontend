<?php

use Carbon\Carbon;

function avatar($avatarName = null)
{
  if ($avatarName !== null) {
    return request()->root() . '/images/avatar/' . $avatarName;
  } else {
    return request()->root() . '/images/avatar/default-avatar.png';
  }
}

/**
 * Transform a date value into a Carbon object.
 *
 * @return \Carbon\Carbon|null
 */
function transformDate($value)
{
  if (gettype($value) === 'string') {
    return date('Y-m-d H:i:s', strtotime($value));
  } else {
    return null;
  };
}
