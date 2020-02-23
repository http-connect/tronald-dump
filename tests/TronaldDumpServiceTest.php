<?php

namespace HttpConnect\Boilerplate\Tests;

use HttpConnect\HttpConnect\Service\External\Exceptions\RequirementNotMetException;
use HttpConnect\HttpConnect\Validation\Exceptions\MetadataValidationFailedException;
use HttpConnect\TronaldDump\Transport\QuoteResource;
use HttpConnect\TronaldDump\TronaldDumpService;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;

class TronaldDumpServiceTest extends TestCase
{
    /**
     * @throws RequirementNotMetException
     * @throws MetadataValidationFailedException
     * @throws ClientExceptionInterface
     */
    public function testGetRandomQuoteAction(): void
    {
        $service = new TronaldDumpService();

        /** @var QuoteResource $quote */
        $quote = $service->getRandomQuote();

        $this->assertInstanceOf(QuoteResource::class, $quote);
    }
}
