<?php
/**
 * Date: 19/06/13
 * Time: 23:07
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\DBBundle\Entity;


class BaseEntity
{
    protected $dateFormat = "Y-m-d H:i:s";

    protected $timezone = "Europe/Paris";

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     * @return $this
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return $this
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }


}
