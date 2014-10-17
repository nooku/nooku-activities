<?php
/**
 * Nooku Framework - http://nooku.org/framework
 *
 * @copyright      Copyright (C) 2011 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link           http://github.com/nooku/nooku-activities for the canonical source repository
 */

/**
 * Activity Template Helper.
 *
 * @author  Arunas Mazeika <https://github.com/amazeika>
 * @package Koowa\Component\Activities
 */
class ComActivitiesTemplateHelperActivity extends KTemplateHelperAbstract implements KObjectMultiton, ComActivitiesActivityRendererInterface
{
    /**
     * Renders an activity.
     *
     * Wraps around {@link render()} for easy use on layouts.
     *
     * @param array $config An optional configuration array.
     *
     * @return string The rendered activity.
     */
    public function activity($config = array())
    {
        $config = new KObjectConfig($config);

        $output = '';

        if ($activity = $config->entity) {
            $output = $this->render($activity, $config);
        }

        return $output;
    }

    /**
     * Renders an activity.
     *
     * @param ComActivitiesActivityInterface $activity The activity object.
     * @param array                          $config   An optional configuration array.
     *
     * @return string The rendered activity.
     */
    public function render(ComActivitiesActivityInterface $activity, $config = array())
    {
        $config = new KObjectConfig($config);

        $output = $activity->getActivityFormat();

        if (preg_match_all('/{(.*?)}/', $output, $labels))
        {
            $tokens = $activity->tokens;

            foreach ($labels[1] as $label)
            {
                $parts = explode(':', $label);
                $label = $parts[0];

                if (isset($tokens[$label]))
                {
                    $object = $tokens[$label];

                    // Deal with context translations.
                    if (isset($parts[1]))
                    {
                        $object = clone $object;
                        $object->setDisplayName($parts[1]);
                    }

                    if ($object = $this->_renderObject($object, $config)) {
                        $output = str_replace('{' . $label . '}', $object, $output);
                    }
                }
            }
        }

        return $output;
    }

    /**
     * Renders an activity object.
     *
     * @param ComActivitiesActivityObjectInterface $object The activity object.
     * @param KObjectConfig                        $config The configuration object.
     *
     * @return string The rendered object.
     */
    protected function _renderObject(ComActivitiesActivityObjectInterface $object, KObjectConfig $config)
    {
        $config->append(array('html' => true, 'escaped_urls' => true, 'fqr' => false));

        if ($output = $object->getDisplayName())
        {
            if ($config->html)
            {
                $output  = $object->getDisplayName();
                $attribs = $object->getAttributes() ? $this->buildAttributes($object->getAttributes()) : '';

                if ($url = $object->getUrl())
                {
                    // Make sure we have a fully qualified route.
                    if ($config->fqr && !$url->getHost()) {
                        $url->setUrl($this->getTemplate()->url()->toString(KHttpUrl::AUTHORITY));
                    }

                    $url    = $url->toString(KHttpUrl::FULL, $config->escaped_urls);
                    $output = "<a {$attribs} href=\"{$url}\">{$output}</a>";
                }
                else $output = "<span {$attribs}>{$output}</span>";
            }
        }
        else $output = '';

        return $output;
    }
}
