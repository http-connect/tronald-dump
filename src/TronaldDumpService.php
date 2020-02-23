<?php

namespace HttpConnect\TronaldDump;

use HttpConnect\HttpConnect\Transport\AnonymousInput;
use HttpConnect\TronaldDump\Action\GetRandomQuote;
use HttpConnect\HttpConnect\Action\ActionPack;
use HttpConnect\HttpConnect\Config\Config;
use HttpConnect\HttpConnect\Config\RepositoryInterface;
use HttpConnect\HttpConnect\Service\External\SymfonyHttpClientAdapterService;
use HttpConnect\HttpConnect\Transport\ResourceInterface;
use HttpConnect\HttpConnect\Validation\Exceptions\MetadataValidationFailedException;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientExceptionInterface;

final class TronaldDumpService extends SymfonyHttpClientAdapterService
{
    /**
     * @return ContainerInterface
     */
    protected static function createActionPack(): ContainerInterface
    {
        return new ActionPack([
            new GetRandomQuote(),
        ]);
    }

    /**
     * @param array $rawConfig
     * @return RepositoryInterface
     * @throws MetadataValidationFailedException
     */
    public static function createConfig(array $rawConfig): RepositoryInterface
    {
        return new Config([
            'baseUri' => 'https://api.tronalddump.io/',
            'serviceName' => 'TronaldDump',
            'serviceDescription' => 'TronaldDump.io API Client',
            'serviceId' => 'http-connect-tronald-dump',
            'logFilePath' => dirname(__DIR__, 2) . '/var/logs/api.log',
        ]);
    }

    /**
     * @return ResourceInterface
     * @throws MetadataValidationFailedException
     * @throws ClientExceptionInterface
     */
    public function getRandomQuote(): ResourceInterface
    {
        return $this->call(GetRandomQuote::class, new AnonymousInput([]));
    }
}
