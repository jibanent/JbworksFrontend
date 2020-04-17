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
