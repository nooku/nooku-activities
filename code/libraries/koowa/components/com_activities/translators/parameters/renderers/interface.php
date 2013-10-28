<?php
/**
 * Koowa Framework - http://developer.joomlatools.com/koowa
 *
 * @copyright	Copyright (C) 2011 - 2013 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://github.com/joomlatools/koowa-activities for the canonical source repository
 */

/**
 * Activity Translator Parameter Renderer Interface
 *
 * @author  Arunas Mazeika <https://github.com/amazeika>
 * @package Koowa\Component\Activities
 */
interface ComActivitiesTranslatorParameterRendererInterface
{
    /**
     * Renders a parameter object.
     *
     * @param $parameter ComActivitiesTranslatorParameterInterface The parameter object.
     *
     * @return string The rendered parameter object.
     */
    public function render(ComActivitiesTranslatorParameterInterface $parameter);
}