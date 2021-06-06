<?php

class PremiumMember extends Member {
    private $_inDoorInterests;
    private $_outDoorInterests;

    function __construct()
    {
        parent::__construct();
        $this->_inDoorInterests = array();
        $this->_outDoorInterests = array();
    }

    /**
     * @return array
     */
    public function getInDoorInterests(): array
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param array $inDoorInterests
     */
    public function setInDoorInterests(array $inDoorInterests): void
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return array
     */
    public function getOutDoorInterests(): array
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests(array $outDoorInterests): void
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}