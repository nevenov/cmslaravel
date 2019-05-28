<?php

namespace Illuminate\Mail\Transport;

<<<<<<< HEAD
use Swift_Mime_Message;
use GuzzleHttp\Post\PostFile;
=======
use Swift_Mime_SimpleMessage;
>>>>>>> dev
use GuzzleHttp\ClientInterface;

class MailgunTransport extends Transport
{
    /**
     * Guzzle client instance.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * The Mailgun API key.
     *
     * @var string
     */
    protected $key;

    /**
<<<<<<< HEAD
     * The Mailgun domain.
=======
     * The Mailgun email domain.
>>>>>>> dev
     *
     * @var string
     */
    protected $domain;

    /**
<<<<<<< HEAD
     * THe Mailgun API end-point.
     *
     * @var string
     */
    protected $url;
=======
     * The Mailgun API end-point.
     *
     * @var string
     */
    protected $endpoint;
>>>>>>> dev

    /**
     * Create a new Mailgun transport instance.
     *
     * @param  \GuzzleHttp\ClientInterface  $client
     * @param  string  $key
     * @param  string  $domain
<<<<<<< HEAD
     * @return void
     */
    public function __construct(ClientInterface $client, $key, $domain)
    {
        $this->key = $key;
        $this->client = $client;
=======
     * @param  string|null  $endpoint
     * @return void
     */
    public function __construct(ClientInterface $client, $key, $domain, $endpoint = null)
    {
        $this->key = $key;
        $this->client = $client;
        $this->endpoint = $endpoint ?? 'api.mailgun.net';

>>>>>>> dev
        $this->setDomain($domain);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function send(Swift_Mime_Message $message, &$failedRecipients = null)
    {
        $this->beforeSendPerformed($message);

        $options = ['auth' => ['api', $this->key]];

=======
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        $this->beforeSendPerformed($message);

>>>>>>> dev
        $to = $this->getTo($message);

        $message->setBcc([]);

<<<<<<< HEAD
        if (version_compare(ClientInterface::VERSION, '6') === 1) {
            $options['multipart'] = [
                ['name' => 'to', 'contents' => $to],
                ['name' => 'message', 'contents' => $message->toString(), 'filename' => 'message.mime'],
            ];
        } else {
            $options['body'] = [
                'to' => $to,
                'message' => new PostFile('message', $message->toString()),
            ];
        }

        return $this->client->post($this->url, $options);
    }

    /**
     * Get the "to" payload field for the API request.
     *
     * @param  \Swift_Mime_Message  $message
     * @return array
     */
    protected function getTo(Swift_Mime_Message $message)
    {
        $formatted = [];

        $contacts = array_merge(
            (array) $message->getTo(), (array) $message->getCc(), (array) $message->getBcc()
        );

        foreach ($contacts as $address => $display) {
            $formatted[] = $display ? $display." <$address>" : $address;
        }

        return implode(',', $formatted);
=======
        $this->client->request(
            'POST',
            "https://{$this->endpoint}/v3/{$this->domain}/messages.mime",
            $this->payload($message, $to)
        );

        $this->sendPerformed($message);

        return $this->numberOfRecipients($message);
    }

    /**
     * Get the HTTP payload for sending the Mailgun message.
     *
     * @param  \Swift_Mime_SimpleMessage  $message
     * @param  string  $to
     * @return array
     */
    protected function payload(Swift_Mime_SimpleMessage $message, $to)
    {
        return [
            'auth' => [
                'api',
                $this->key,
            ],
            'multipart' => [
                [
                    'name' => 'to',
                    'contents' => $to,
                ],
                [
                    'name' => 'message',
                    'contents' => $message->toString(),
                    'filename' => 'message.mime',
                ],
            ],
        ];
    }

    /**
     * Get the "to" payload field for the API request.
     *
     * @param  \Swift_Mime_SimpleMessage  $message
     * @return string
     */
    protected function getTo(Swift_Mime_SimpleMessage $message)
    {
        return collect($this->allContacts($message))->map(function ($display, $address) {
            return $display ? $display." <{$address}>" : $address;
        })->values()->implode(',');
    }

    /**
     * Get all of the contacts for the message.
     *
     * @param  \Swift_Mime_SimpleMessage  $message
     * @return array
     */
    protected function allContacts(Swift_Mime_SimpleMessage $message)
    {
        return array_merge(
            (array) $message->getTo(), (array) $message->getCc(), (array) $message->getBcc()
        );
>>>>>>> dev
    }

    /**
     * Get the API key being used by the transport.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the API key being used by the transport.
     *
     * @param  string  $key
     * @return string
     */
    public function setKey($key)
    {
        return $this->key = $key;
    }

    /**
     * Get the domain being used by the transport.
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set the domain being used by the transport.
     *
     * @param  string  $domain
<<<<<<< HEAD
     * @return void
     */
    public function setDomain($domain)
    {
        $this->url = 'https://api.mailgun.net/v3/'.$domain.'/messages.mime';

=======
     * @return string
     */
    public function setDomain($domain)
    {
>>>>>>> dev
        return $this->domain = $domain;
    }
}
