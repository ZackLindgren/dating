<?php

/**
 * The PremiumMember class represents a premium member on the Luvdisc Dating site
 *
 * The PremiumMember class represents a premium member with both indoor and outdoor interests.
 *
 * @author Zack L.
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * Gets the inDoorInterests of the member
     *
     * @return string
     */
    function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * Sets the inDoorInterests of the premium member
     *
     * @param string $inDoorInterests The new indoor interests for the member
     * @return void
     */
    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * Gets the outDoorInterests of the member
     *
     * @return string
     */
    function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * Sets the outDoorInterests of the premium member
     *
     * @param string $outDoorInterests The new outdoor interests for the member
     * @return void
     */
    function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}