<?php

/**
 * Resets the session and redirects to the index to execute logoff.
 */

// Start session
session_start();

// Reset session
session_unset();
header("../index.php");
