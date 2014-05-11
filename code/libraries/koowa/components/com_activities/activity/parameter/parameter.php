<?php
/**
 * Koowa Framework - http://developer.joomlatools.com/koowa
 *
 * @copyright      Copyright (C) 2011 - 2013 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link           http://github.com/joomlatools/koowa-activities for the canonical source repository
 */

/**
 * Activity Parameter
 *
 * @author  Arunas Mazeika <https://github.com/amazeika>
 * @package Koowa\Component\Activities
 */
class ComActivitiesActivityParameter extends KObjectConfig implements ComActivitiesActivityParameterInterface
{
    /**
     * The parameter name
     *
     * @var string
     */
    private $__name;

    /**
     * The parameter content.
     *
     * This property contains the formatted text that is be used for rendering activity messages.
     *
     * @var string
     */
    protected $_content;

    /**
     * Constructor.
     *
     * @param	string 			$name The command name
     * @param   array|KObjectConfig 	$config An associative array of configuration settings or a KObjectConfig instance.
     */
    public function __construct( $name, $config = array())
    {
        parent::__construct($config);

        $this->append(array(
            'value'     => '',
            'url'       => '',
            'link_attributes' => array(),
            'attributes'      => array(
                'class' => array('parameter')
            )
        ));

        //Set the command name
        $this->__name = $name;
    }

    /**
     * Get the parameter name
     *
     * A name uniquely identifies a parameter.
     *
     * @return string The parameter name
     */
    public function getName()
    {
        return $this->__name;
    }

    /**
     * Get the parameter value
     *
     * @param mixed $value The parameter value.
     * @return ComActivitiesActivityParameterInterface
     */
    public function setValue($value)
    {
        $this->value = (string) $value;
        return $this;
    }

    /**
     * Set the parameter value
     *
     * @return string The parameter value.
     */
    public function getValue()
    {
        $value = $this->value;
        return $value;
    }

    /**
     * Set the URL
     *
     * @param string $url The parameter URL.
     * @return ComActivitiesActivityParameterInterface
     */
    public function setUrl($url)
    {
        $this->url = (string) $url;
        return $this;
    }

    /**
     * Get the URL
     *
     * @return string The parameter url.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the attributes
     *
     * @param array $attributes The parameter attributes.
     * @return ComActivitiesActivityParameterInterface
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Get the attributes
     *
     * @return array The parameter attributes.
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Link attributes setter.
     *
     * @param array $attributes The parameter link attributes.
     * @return ComActivitiesActivityParameterInterface
     */
    public function setLinkAttributes($attributes)
    {
        $this->link_attributes = $attributes;
        return $this;
    }

    /**
     * Get the link attributes
     *
     * @return array The parameter attributes.
     */
    public function getLinkAttributes()
    {
        return $this->link_attributes;
    }

    /**
     * Set the parameter content
     *
     * @param string $content The parameter content.
     * @return ComActivitiesActivityParameterInterface
     */
    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }

    /**
     * Get the parameter content
     *
     * @return string The parameter content.
     */
    public function getContent()
    {
        if (!$content = $this->_content) {
            $content = $this->getValue();
        }

        return $content;
    }

    /**
     * Tells if the parameter is linkable or not.
     *
     * @return bool
     */
    public function isLinkable()
    {
        return (bool) $this->getUrl();
    }

    /**
     * Casts an activity parameter to string.
     *
     * @return string The string representation of an activity parameter.
     */
    public function toString()
    {
        return $this->getContent();
    }

    /**
     * Set a parameter property
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function set($name, $value)
    {
        if (is_array($value)) {
            $value = new KObjectConfig($value);
        }

        parent::set($name, $value);
    }

    /**
     * Allow PHP casting of this object
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}