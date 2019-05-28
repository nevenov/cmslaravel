<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

<<<<<<< HEAD
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Config\ConfigCacheInterface;
use Symfony\Component\Config\ConfigCacheFactoryInterface;
use Symfony\Component\Config\ConfigCacheFactory;

/**
 * Translator.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Translator implements TranslatorInterface, TranslatorBagInterface
=======
use Symfony\Component\Config\ConfigCacheFactory;
use Symfony\Component\Config\ConfigCacheFactoryInterface;
use Symfony\Component\Config\ConfigCacheInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\Exception\RuntimeException;
use Symfony\Component\Translation\Formatter\ChoiceMessageFormatterInterface;
use Symfony\Component\Translation\Formatter\IntlFormatterInterface;
use Symfony\Component\Translation\Formatter\MessageFormatter;
use Symfony\Component\Translation\Formatter\MessageFormatterInterface;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\TranslatorInterface as LegacyTranslatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Translator implements LegacyTranslatorInterface, TranslatorInterface, TranslatorBagInterface
>>>>>>> dev
{
    /**
     * @var MessageCatalogueInterface[]
     */
<<<<<<< HEAD
    protected $catalogues = array();
=======
    protected $catalogues = [];
>>>>>>> dev

    /**
     * @var string
     */
    private $locale;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $fallbackLocales = array();
=======
    private $fallbackLocales = [];
>>>>>>> dev

    /**
     * @var LoaderInterface[]
     */
<<<<<<< HEAD
    private $loaders = array();
=======
    private $loaders = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $resources = array();

    /**
     * @var MessageSelector
     */
    private $selector;
=======
    private $resources = [];

    /**
     * @var MessageFormatterInterface
     */
    private $formatter;
>>>>>>> dev

    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var ConfigCacheFactoryInterface|null
     */
    private $configCacheFactory;

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param string               $locale   The locale
     * @param MessageSelector|null $selector The message selector for pluralization
     * @param string|null          $cacheDir The directory to use for the cache
     * @param bool                 $debug    Use cache in debug mode ?
     *
     * @throws \InvalidArgumentException If a locale contains invalid characters
     */
    public function __construct($locale, MessageSelector $selector = null, $cacheDir = null, $debug = false)
    {
        $this->setLocale($locale);
        $this->selector = $selector ?: new MessageSelector();
        $this->cacheDir = $cacheDir;
        $this->debug = $debug;
    }

    /**
     * Sets the ConfigCache factory to use.
     *
     * @param ConfigCacheFactoryInterface $configCacheFactory
     */
=======
     * @var array|null
     */
    private $parentLocales;

    private $hasIntlFormatter;

    /**
     * @throws InvalidArgumentException If a locale contains invalid characters
     */
    public function __construct(?string $locale, MessageFormatterInterface $formatter = null, string $cacheDir = null, bool $debug = false)
    {
        $this->setLocale($locale);

        if (null === $formatter) {
            $formatter = new MessageFormatter();
        }

        $this->formatter = $formatter;
        $this->cacheDir = $cacheDir;
        $this->debug = $debug;
        $this->hasIntlFormatter = $formatter instanceof IntlFormatterInterface;
    }

>>>>>>> dev
    public function setConfigCacheFactory(ConfigCacheFactoryInterface $configCacheFactory)
    {
        $this->configCacheFactory = $configCacheFactory;
    }

    /**
     * Adds a Loader.
     *
     * @param string          $format The name of the loader (@see addResource())
     * @param LoaderInterface $loader A LoaderInterface instance
     */
    public function addLoader($format, LoaderInterface $loader)
    {
        $this->loaders[$format] = $loader;
    }

    /**
     * Adds a Resource.
     *
     * @param string $format   The name of the loader (@see addLoader())
     * @param mixed  $resource The resource name
     * @param string $locale   The locale
     * @param string $domain   The domain
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If the locale contains invalid characters
=======
     * @throws InvalidArgumentException If the locale contains invalid characters
>>>>>>> dev
     */
    public function addResource($format, $resource, $locale, $domain = null)
    {
        if (null === $domain) {
            $domain = 'messages';
        }

        $this->assertValidLocale($locale);

<<<<<<< HEAD
        $this->resources[$locale][] = array($format, $resource, $domain);

        if (in_array($locale, $this->fallbackLocales)) {
            $this->catalogues = array();
=======
        $this->resources[$locale][] = [$format, $resource, $domain];

        if (\in_array($locale, $this->fallbackLocales)) {
            $this->catalogues = [];
>>>>>>> dev
        } else {
            unset($this->catalogues[$locale]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->assertValidLocale($locale);
        $this->locale = $locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Sets the fallback locales.
     *
     * @param array $locales The fallback locales
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If a locale contains invalid characters
=======
     * @throws InvalidArgumentException If a locale contains invalid characters
>>>>>>> dev
     */
    public function setFallbackLocales(array $locales)
    {
        // needed as the fallback locales are linked to the already loaded catalogues
<<<<<<< HEAD
        $this->catalogues = array();
=======
        $this->catalogues = [];
>>>>>>> dev

        foreach ($locales as $locale) {
            $this->assertValidLocale($locale);
        }

        $this->fallbackLocales = $locales;
    }

    /**
     * Gets the fallback locales.
     *
<<<<<<< HEAD
     * @return array $locales The fallback locales
=======
     * @internal since Symfony 4.2
     *
     * @return array The fallback locales
>>>>>>> dev
     */
    public function getFallbackLocales()
    {
        return $this->fallbackLocales;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
=======
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
>>>>>>> dev
    {
        if (null === $domain) {
            $domain = 'messages';
        }

<<<<<<< HEAD
        return strtr($this->getCatalogue($locale)->get((string) $id, $domain), $parameters);
=======
        $id = (string) $id;
        $catalogue = $this->getCatalogue($locale);
        $locale = $catalogue->getLocale();
        while (!$catalogue->defines($id, $domain)) {
            if ($cat = $catalogue->getFallbackCatalogue()) {
                $catalogue = $cat;
                $locale = $catalogue->getLocale();
            } else {
                break;
            }
        }

        if ($this->hasIntlFormatter && $catalogue->defines($id, $domain.MessageCatalogue::INTL_DOMAIN_SUFFIX)) {
            return $this->formatter->formatIntl($catalogue->get($id, $domain), $locale, $parameters);
        }

        return $this->formatter->format($catalogue->get($id, $domain), $locale, $parameters);
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     */
    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
=======
     *
     * @deprecated since Symfony 4.2, use the trans() method instead with a %count% parameter
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.2, use the trans() one instead with a "%%count%%" parameter.', __METHOD__), E_USER_DEPRECATED);

        if (!$this->formatter instanceof ChoiceMessageFormatterInterface) {
            throw new LogicException(sprintf('The formatter "%s" does not support plural translations.', \get_class($this->formatter)));
        }

>>>>>>> dev
        if (null === $domain) {
            $domain = 'messages';
        }

        $id = (string) $id;
        $catalogue = $this->getCatalogue($locale);
        $locale = $catalogue->getLocale();
        while (!$catalogue->defines($id, $domain)) {
            if ($cat = $catalogue->getFallbackCatalogue()) {
                $catalogue = $cat;
                $locale = $catalogue->getLocale();
            } else {
                break;
            }
        }

<<<<<<< HEAD
        return strtr($this->selector->choose($catalogue->get($id, $domain), (int) $number, $locale), $parameters);
=======
        if ($this->hasIntlFormatter && $catalogue->defines($id, $domain.MessageCatalogue::INTL_DOMAIN_SUFFIX)) {
            return $this->formatter->formatIntl($catalogue->get($id, $domain), $locale, ['%count%' => $number] + $parameters);
        }

        return $this->formatter->choiceFormat($catalogue->get($id, $domain), $number, $locale, $parameters);
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function getCatalogue($locale = null)
    {
        if (null === $locale) {
            $locale = $this->getLocale();
        } else {
            $this->assertValidLocale($locale);
        }

        if (!isset($this->catalogues[$locale])) {
            $this->loadCatalogue($locale);
        }

        return $this->catalogues[$locale];
    }

    /**
     * Gets the loaders.
     *
     * @return array LoaderInterface[]
     */
    protected function getLoaders()
    {
        return $this->loaders;
    }

    /**
     * @param string $locale
     */
    protected function loadCatalogue($locale)
    {
        if (null === $this->cacheDir) {
            $this->initializeCatalogue($locale);
        } else {
            $this->initializeCacheCatalogue($locale);
        }
    }

    /**
     * @param string $locale
     */
    protected function initializeCatalogue($locale)
    {
        $this->assertValidLocale($locale);

        try {
            $this->doLoadCatalogue($locale);
        } catch (NotFoundResourceException $e) {
            if (!$this->computeFallbackLocales($locale)) {
                throw $e;
            }
        }
        $this->loadFallbackCatalogues($locale);
    }

<<<<<<< HEAD
    /**
     * @param string $locale
     */
    private function initializeCacheCatalogue($locale)
=======
    private function initializeCacheCatalogue(string $locale): void
>>>>>>> dev
    {
        if (isset($this->catalogues[$locale])) {
            /* Catalogue already initialized. */
            return;
        }

        $this->assertValidLocale($locale);
        $cache = $this->getConfigCacheFactory()->cache($this->getCatalogueCachePath($locale),
            function (ConfigCacheInterface $cache) use ($locale) {
                $this->dumpCatalogue($locale, $cache);
            }
        );

        if (isset($this->catalogues[$locale])) {
            /* Catalogue has been initialized as it was written out to cache. */
            return;
        }

        /* Read catalogue from cache. */
        $this->catalogues[$locale] = include $cache->getPath();
    }

<<<<<<< HEAD
    private function dumpCatalogue($locale, ConfigCacheInterface $cache)
=======
    private function dumpCatalogue($locale, ConfigCacheInterface $cache): void
>>>>>>> dev
    {
        $this->initializeCatalogue($locale);
        $fallbackContent = $this->getFallbackContent($this->catalogues[$locale]);

        $content = sprintf(<<<EOF
<?php

use Symfony\Component\Translation\MessageCatalogue;

\$catalogue = new MessageCatalogue('%s', %s);

%s
return \$catalogue;

EOF
            ,
            $locale,
<<<<<<< HEAD
            var_export($this->catalogues[$locale]->all(), true),
=======
            var_export($this->getAllMessages($this->catalogues[$locale]), true),
>>>>>>> dev
            $fallbackContent
        );

        $cache->write($content, $this->catalogues[$locale]->getResources());
    }

<<<<<<< HEAD
    private function getFallbackContent(MessageCatalogue $catalogue)
=======
    private function getFallbackContent(MessageCatalogue $catalogue): string
>>>>>>> dev
    {
        $fallbackContent = '';
        $current = '';
        $replacementPattern = '/[^a-z0-9_]/i';
        $fallbackCatalogue = $catalogue->getFallbackCatalogue();
        while ($fallbackCatalogue) {
            $fallback = $fallbackCatalogue->getLocale();
            $fallbackSuffix = ucfirst(preg_replace($replacementPattern, '_', $fallback));
            $currentSuffix = ucfirst(preg_replace($replacementPattern, '_', $current));

<<<<<<< HEAD
            $fallbackContent .= sprintf(<<<EOF
\$catalogue%s = new MessageCatalogue('%s', %s);
\$catalogue%s->addFallbackCatalogue(\$catalogue%s);
=======
            $fallbackContent .= sprintf(<<<'EOF'
$catalogue%s = new MessageCatalogue('%s', %s);
$catalogue%s->addFallbackCatalogue($catalogue%s);
>>>>>>> dev

EOF
                ,
                $fallbackSuffix,
                $fallback,
<<<<<<< HEAD
                var_export($fallbackCatalogue->all(), true),
=======
                var_export($this->getAllMessages($fallbackCatalogue), true),
>>>>>>> dev
                $currentSuffix,
                $fallbackSuffix
            );
            $current = $fallbackCatalogue->getLocale();
            $fallbackCatalogue = $fallbackCatalogue->getFallbackCatalogue();
        }

        return $fallbackContent;
    }

    private function getCatalogueCachePath($locale)
    {
<<<<<<< HEAD
        return $this->cacheDir.'/catalogue.'.$locale.'.'.sha1(serialize($this->fallbackLocales)).'.php';
    }

    private function doLoadCatalogue($locale)
=======
        return $this->cacheDir.'/catalogue.'.$locale.'.'.strtr(substr(base64_encode(hash('sha256', serialize($this->fallbackLocales), true)), 0, 7), '/', '_').'.php';
    }

    private function doLoadCatalogue($locale): void
>>>>>>> dev
    {
        $this->catalogues[$locale] = new MessageCatalogue($locale);

        if (isset($this->resources[$locale])) {
            foreach ($this->resources[$locale] as $resource) {
                if (!isset($this->loaders[$resource[0]])) {
<<<<<<< HEAD
                    throw new \RuntimeException(sprintf('The "%s" translation loader is not registered.', $resource[0]));
=======
                    throw new RuntimeException(sprintf('The "%s" translation loader is not registered.', $resource[0]));
>>>>>>> dev
                }
                $this->catalogues[$locale]->addCatalogue($this->loaders[$resource[0]]->load($resource[1], $locale, $resource[2]));
            }
        }
    }

<<<<<<< HEAD
    private function loadFallbackCatalogues($locale)
=======
    private function loadFallbackCatalogues($locale): void
>>>>>>> dev
    {
        $current = $this->catalogues[$locale];

        foreach ($this->computeFallbackLocales($locale) as $fallback) {
            if (!isset($this->catalogues[$fallback])) {
<<<<<<< HEAD
                $this->doLoadCatalogue($fallback);
            }

            $fallbackCatalogue = new MessageCatalogue($fallback, $this->catalogues[$fallback]->all());
=======
                $this->initializeCatalogue($fallback);
            }

            $fallbackCatalogue = new MessageCatalogue($fallback, $this->getAllMessages($this->catalogues[$fallback]));
>>>>>>> dev
            foreach ($this->catalogues[$fallback]->getResources() as $resource) {
                $fallbackCatalogue->addResource($resource);
            }
            $current->addFallbackCatalogue($fallbackCatalogue);
            $current = $fallbackCatalogue;
        }
    }

    protected function computeFallbackLocales($locale)
    {
<<<<<<< HEAD
        $locales = array();
=======
        if (null === $this->parentLocales) {
            $parentLocales = \json_decode(\file_get_contents(__DIR__.'/Resources/data/parents.json'), true);
        }

        $locales = [];
>>>>>>> dev
        foreach ($this->fallbackLocales as $fallback) {
            if ($fallback === $locale) {
                continue;
            }

            $locales[] = $fallback;
        }

<<<<<<< HEAD
        if (strrchr($locale, '_') !== false) {
            array_unshift($locales, substr($locale, 0, -strlen(strrchr($locale, '_'))));
=======
        while ($locale) {
            $parent = $parentLocales[$locale] ?? null;

            if (!$parent && false !== strrchr($locale, '_')) {
                $locale = substr($locale, 0, -\strlen(strrchr($locale, '_')));
            } elseif ('root' !== $parent) {
                $locale = $parent;
            } else {
                $locale = null;
            }

            if (null !== $locale) {
                array_unshift($locales, $locale);
            }
>>>>>>> dev
        }

        return array_unique($locales);
    }

    /**
     * Asserts that the locale is valid, throws an Exception if not.
     *
     * @param string $locale Locale to tests
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If the locale contains invalid characters
=======
     * @throws InvalidArgumentException If the locale contains invalid characters
>>>>>>> dev
     */
    protected function assertValidLocale($locale)
    {
        if (1 !== preg_match('/^[a-z0-9@_\\.\\-]*$/i', $locale)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Invalid "%s" locale.', $locale));
=======
            throw new InvalidArgumentException(sprintf('Invalid "%s" locale.', $locale));
>>>>>>> dev
        }
    }

    /**
     * Provides the ConfigCache factory implementation, falling back to a
     * default implementation if necessary.
<<<<<<< HEAD
     *
     * @return ConfigCacheFactoryInterface $configCacheFactory
     */
    private function getConfigCacheFactory()
=======
     */
    private function getConfigCacheFactory(): ConfigCacheFactoryInterface
>>>>>>> dev
    {
        if (!$this->configCacheFactory) {
            $this->configCacheFactory = new ConfigCacheFactory($this->debug);
        }

        return $this->configCacheFactory;
    }
<<<<<<< HEAD
=======

    private function getAllMessages(MessageCatalogueInterface $catalogue): array
    {
        $allMessages = [];

        foreach ($catalogue->all() as $domain => $messages) {
            if ($intlMessages = $catalogue->all($domain.MessageCatalogue::INTL_DOMAIN_SUFFIX)) {
                $allMessages[$domain.MessageCatalogue::INTL_DOMAIN_SUFFIX] = $intlMessages;
                $messages = array_diff_key($messages, $intlMessages);
            }
            if ($messages) {
                $allMessages[$domain] = $messages;
            }
        }

        return $allMessages;
    }
>>>>>>> dev
}
