<?php
/**
 * ZIP-checker markup — brief-path alias.
 *
 * The §3 structure lists the ZIP form at template-parts/zip-checker.php; the
 * actual markup lives at template-parts/section/zip-checker.php (loaded by the
 * hero). This passthrough keeps both paths valid for anyone calling
 * get_template_part('template-parts/zip-checker').
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_template_part('template-parts/section/zip-checker');
