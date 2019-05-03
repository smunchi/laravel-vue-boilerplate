<?php
function exception(\Exception $e): string
{
    return "[Exception] File: " . $e->getFile() . ' Line: ' . $e->getLine() . ' Msg: ' . $e->getMessage();
}
