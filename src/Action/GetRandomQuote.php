<?php

namespace HttpConnect\TronaldDump\Action;

use DateTimeImmutable;
use HttpConnect\TronaldDump\Transport\QuoteResource;
use HttpConnect\HttpConnect\Action\Action;
use HttpConnect\HttpConnect\Transport\InputInterface;
use HttpConnect\HttpConnect\Transport\ResourceInterface;
use Nyholm\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Rize\UriTemplate;

class GetRandomQuote extends Action
{
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return 'Random Quote';
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return 'Retrieve a random quote';
    }

    /**
     * @return string
     */
    protected function getMethod(): string
    {
        return self::GET;
    }

    /**
     * @param InputInterface $input
     * @return UriInterface
     */
    protected function createUri(InputInterface $input): UriInterface
    {
        return new Uri((new UriTemplate())->expand('random/quote'));
    }

    /**
     * @param ResponseInterface $response
     * @return ResourceInterface
     * @throws \Exception
     */
    public function transformResponse(ResponseInterface $response): ResourceInterface
    {
        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        return new QuoteResource(
            new DateTimeImmutable($data['appeared_at']),
            new DateTimeImmutable($data['created_at']),
            $data['quote_id'],
            $data['tags'],
            new DateTimeImmutable($data['updated_at']),
            $data['value'],
            $data['_embedded']
        );
    }

    /**
     * @param InputInterface $input
     * @return array
     */
    protected function createHeaders(InputInterface $input): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }
}
