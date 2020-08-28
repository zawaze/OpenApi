<?php


namespace OpenApi\Model\Api;

use OpenApi\Service\ImageService;
use Symfony\Component\HttpFoundation\RequestStack;

class Image extends File
{
    /** @var ImageService */
    protected $imageService;

    public function __construct(ModelFactory $modelFactory, RequestStack $requestStack, ImageService $imageService)
    {
        parent::__construct($modelFactory, $requestStack);
        $this->imageService = $imageService;
    }

    /**
     * @param $theliaModel
     * @param null $locale
     * @param null $type
     * @return $this
     */
    public function createFromTheliaModel($theliaModel, $locale = null, $type = null)
    {
        parent::createFromTheliaModel($theliaModel, $locale);
        $this->url = $this->imageService->getImageUrl($theliaModel, $type);

        return $this;
    }
}