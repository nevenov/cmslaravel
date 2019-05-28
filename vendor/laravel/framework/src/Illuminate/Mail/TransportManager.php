<?php

namespace Illuminate\Mail;

use Aws\Ses\SesClient;
use Illuminate\Support\Arr;
<<<<<<< HEAD
use Illuminate\Support\Manager;
use GuzzleHttp\Client as HttpClient;
use Swift_SmtpTransport as SmtpTransport;
use Swift_MailTransport as MailTransport;
use Illuminate\Mail\Transport\LogTransport;
use Illuminate\Mail\Transport\SesTransport;
=======
use Psr\Log\LoggerInterface;
use Illuminate\Log\LogManager;
use Illuminate\Support\Manager;
use GuzzleHttp\Client as HttpClient;
use Swift_SmtpTransport as SmtpTransport;
use Illuminate\Mail\Transport\LogTransport;
use Illuminate\Mail\Transport\SesTransport;
use Postmark\Transport as PostmarkTransport;
use Illuminate\Mail\Transport\ArrayTransport;
>>>>>>> dev
use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Mail\Transport\MandrillTransport;
use Illuminate\Mail\Transport\SparkPostTransport;
use Swift_SendmailTransport as SendmailTransport;

class TransportManager extends Manager
{
    /**
     * Create an instance of the SMTP Swift Transport driver.
     *
     * @return \Swift_SmtpTransport
     */
    protected function createSmtpDriver()
    {
<<<<<<< HEAD
        $config = $this->app['config']['mail'];
=======
        $config = $this->app->make('config')->get('mail');
>>>>>>> dev

        // The Swift SMTP transport instance will allow us to use any SMTP backend
        // for delivering mail such as Sendgrid, Amazon SES, or a custom server
        // a developer has available. We will just pass this configured host.
<<<<<<< HEAD
        $transport = SmtpTransport::newInstance(
            $config['host'], $config['port']
        );
=======
        $transport = new SmtpTransport($config['host'], $config['port']);
>>>>>>> dev

        if (isset($config['encryption'])) {
            $transport->setEncryption($config['encryption']);
        }

        // Once we have the transport we will check for the presence of a username
        // and password. If we have it we will set the credentials on the Swift
        // transporter instance so that we'll properly authenticate delivery.
        if (isset($config['username'])) {
            $transport->setUsername($config['username']);

            $transport->setPassword($config['password']);
        }

<<<<<<< HEAD
=======
        // Next we will set any stream context options specified for the transport
        // and then return it. The option is not required any may not be inside
        // the configuration array at all so we'll verify that before adding.
>>>>>>> dev
        if (isset($config['stream'])) {
            $transport->setStreamOptions($config['stream']);
        }

        return $transport;
    }

    /**
     * Create an instance of the Sendmail Swift Transport driver.
     *
     * @return \Swift_SendmailTransport
     */
    protected function createSendmailDriver()
    {
<<<<<<< HEAD
        $command = $this->app['config']['mail']['sendmail'];

        return SendmailTransport::newInstance($command);
=======
        return new SendmailTransport($this->app['config']['mail']['sendmail']);
>>>>>>> dev
    }

    /**
     * Create an instance of the Amazon SES Swift Transport driver.
     *
<<<<<<< HEAD
     * @return \Swift_SendmailTransport
     */
    protected function createSesDriver()
    {
        $config = $this->app['config']->get('services.ses', []);

        $config += [
            'version' => 'latest', 'service' => 'email',
        ];

        if ($config['key'] && $config['secret']) {
            $config['credentials'] = Arr::only($config, ['key', 'secret']);
        }

        return new SesTransport(new SesClient($config));
=======
     * @return \Illuminate\Mail\Transport\SesTransport
     */
    protected function createSesDriver()
    {
        $config = array_merge($this->app['config']->get('services.ses', []), [
            'version' => 'latest', 'service' => 'email',
        ]);

        return new SesTransport(
            new SesClient($this->addSesCredentials($config)),
            $config['options'] ?? []
        );
    }

    /**
     * Add the SES credentials to the configuration array.
     *
     * @param  array  $config
     * @return array
     */
    protected function addSesCredentials(array $config)
    {
        if ($config['key'] && $config['secret']) {
            $config['credentials'] = Arr::only($config, ['key', 'secret', 'token']);
        }

        return $config;
>>>>>>> dev
    }

    /**
     * Create an instance of the Mail Swift Transport driver.
     *
<<<<<<< HEAD
     * @return \Swift_MailTransport
     */
    protected function createMailDriver()
    {
        return MailTransport::newInstance();
=======
     * @return \Swift_SendmailTransport
     */
    protected function createMailDriver()
    {
        return new SendmailTransport;
>>>>>>> dev
    }

    /**
     * Create an instance of the Mailgun Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\MailgunTransport
     */
    protected function createMailgunDriver()
    {
        $config = $this->app['config']->get('services.mailgun', []);

        return new MailgunTransport(
<<<<<<< HEAD
            $this->getHttpClient($config),
            $config['secret'], $config['domain']
=======
            $this->guzzle($config),
            $config['secret'],
            $config['domain'],
            $config['endpoint'] ?? null
>>>>>>> dev
        );
    }

    /**
     * Create an instance of the Mandrill Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\MandrillTransport
     */
    protected function createMandrillDriver()
    {
        $config = $this->app['config']->get('services.mandrill', []);

        return new MandrillTransport(
<<<<<<< HEAD
            $this->getHttpClient($config), $config['secret']
=======
            $this->guzzle($config), $config['secret']
>>>>>>> dev
        );
    }

    /**
     * Create an instance of the SparkPost Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\SparkPostTransport
     */
    protected function createSparkPostDriver()
    {
        $config = $this->app['config']->get('services.sparkpost', []);

        return new SparkPostTransport(
<<<<<<< HEAD
            $this->getHttpClient($config),
            $config['secret'],
            Arr::get($config, 'options', [])
=======
            $this->guzzle($config), $config['secret'], $config['options'] ?? []
        );
    }

    /**
     * Create an instance of the Postmark Swift Transport driver.
     *
     * @return \Swift_Transport
     */
    protected function createPostmarkDriver()
    {
        return new PostmarkTransport(
            $this->app['config']->get('services.postmark.token')
>>>>>>> dev
        );
    }

    /**
     * Create an instance of the Log Swift Transport driver.
     *
     * @return \Illuminate\Mail\Transport\LogTransport
     */
    protected function createLogDriver()
    {
<<<<<<< HEAD
        return new LogTransport($this->app->make('Psr\Log\LoggerInterface'));
=======
        $logger = $this->app->make(LoggerInterface::class);

        if ($logger instanceof LogManager) {
            $logger = $logger->channel($this->app['config']['mail.log_channel']);
        }

        return new LogTransport($logger);
    }

    /**
     * Create an instance of the Array Swift Transport Driver.
     *
     * @return \Illuminate\Mail\Transport\ArrayTransport
     */
    protected function createArrayDriver()
    {
        return new ArrayTransport;
>>>>>>> dev
    }

    /**
     * Get a fresh Guzzle HTTP client instance.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return HttpClient
     */
    protected function getHttpClient($config)
    {
        $guzzleConfig = Arr::get($config, 'guzzle', []);

        return new HttpClient(Arr::add($guzzleConfig, 'connect_timeout', 60));
=======
     * @return \GuzzleHttp\Client
     */
    protected function guzzle($config)
    {
        return new HttpClient(Arr::add(
            $config['guzzle'] ?? [], 'connect_timeout', 60
        ));
>>>>>>> dev
    }

    /**
     * Get the default mail driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['mail.driver'];
    }

    /**
     * Set the default mail driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['mail.driver'] = $name;
    }
}
