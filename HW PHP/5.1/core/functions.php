<?php

function getParam($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}