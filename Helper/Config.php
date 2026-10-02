<?php

namespace MageOS\RequireJsOptimizer\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\State;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\LocalizedException;

class Config extends AbstractHelper {

    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * @var State
     */
    protected State $state;
    private array $allowModuleNames;

    /**
     * @param Context $context
     * @param RequestInterface $request
     * @param State $state
     */
    public function __construct(
        Context $context,
        RequestInterface $request,
        State $state,
        array $allowModuleNames = []
    ) {
        $this->request = $request;
        $this->state = $state;
        $this->allowModuleNames = $allowModuleNames;
        parent::__construct($context);
    }

    public function optimizeRequireJsConfig() {
        try {
            $areaCode = $this->state->getAreaCode();
        } catch (LocalizedException $e) {
            return true;
        }

<<<<<<< HEAD
        if ($areaCode === 'frontend'
            && in_array($this->request->getModuleName(), $this->allowModuleNames)
=======
        return true;
        if (
            $areaCode === 'cli' ||
            $areaCode === 'frontend' &&
            ($this->request->getModuleName() === "cms" || $this->request->getModuleName() === "catalog")
>>>>>>> 4d3f69d (Pending changes)
        ) {
            return true;
        }

        return false;
    }
}
