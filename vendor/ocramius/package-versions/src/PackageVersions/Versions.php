<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => '1.9.1@89a5c76c39c292f7798f964ab3c836c3f8192a55',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => 'v2.11.0@b8ca1dcf6b0dc8a2af7a09baac8d0c48345df4ff',
  'doctrine/dbal' => 'v2.10.0@0c9a646775ef549eb0a213a4f9bd4381d9b4d934',
  'doctrine/doctrine-bundle' => '1.11.2@28101e20776d8fa20a00b54947fbae2db0d09103',
  'doctrine/doctrine-cache-bundle' => '1.3.5@5514c90d9fb595e1095e6d66ebb98ce9ef049927',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.0@8e124252d2f6be1124017d746d5994dd4095d66f',
  'doctrine/orm' => 'v2.7.0@4d763ca4c925f647b248b9fa01b5f47aa3685d62',
  'doctrine/persistence' => '1.2.0@43526ae63312942e5316100bb3ed589ba1aba491',
  'doctrine/reflection' => 'v1.0.0@02538d3f95e88eb397a5f86274deb2c6175c2ab6',
  'egulias/email-validator' => '2.1.11@92dd169c32f6f55ba570c309d83f5209cefb5e23',
  'fig/link-util' => '1.0.0@1a07821801a148be4add11ab0603e4af55a72fac',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'monolog/monolog' => '1.25.2@d5e2fb341cb44f7e2ab639d12a1e5901091ec287',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.2@b83ff7cfcfee7827e1e78b637a5904fe6a96698e',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'sensio/framework-extra-bundle' => 'v5.3.1@5f75c4658b03301cba17baa15a840b57b72b4262',
  'swiftmailer/swiftmailer' => 'v6.2.3@149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
  'symfony/asset' => 'v4.2.12@82f5349982967842aeb7d2f8e876ac900be24f14',
  'symfony/cache' => 'v4.2.12@28286385757fa08c249254541ad814a8ccaff0f7',
  'symfony/config' => 'v4.2.12@637588756df1fb1c801833aead54a7153967c0cb',
  'symfony/console' => 'v4.2.12@fc2e274aade6567a750551942094b2145ade9b6c',
  'symfony/contracts' => 'v1.1.8@f51bca9de06b7a25b19a4155da7bebad099a5def',
  'symfony/debug' => 'v4.4.0@b24b791f817116b29e52a63e8544884cf9a40757',
  'symfony/dependency-injection' => 'v4.2.12@39fe71bc481483f255e388a658c8f1104fec037e',
  'symfony/doctrine-bridge' => 'v4.2.12@5e8d62453eda38a523a12cc918031cc8f48e4b65',
  'symfony/dotenv' => 'v4.2.12@6163f061011009655da1bc615b38941bc460ef1b',
  'symfony/event-dispatcher' => 'v4.2.12@852548c7c704f14d2f6700c8d872a05bd2028732',
  'symfony/expression-language' => 'v4.2.12@ea23981c1dee4f2f901fce8345d34614237d57ca',
  'symfony/filesystem' => 'v4.2.12@1bd7aed2932cedd1c2c6cc925831dd8d57ea14bf',
  'symfony/finder' => 'v4.2.12@cecff7164790b0cd72be2ed20e9591d7140715e0',
  'symfony/flex' => 'v1.4.8@f5bfc79c1f5bed6b2bb4ca9e49a736c2abc03e8f',
  'symfony/form' => 'v4.2.12@c694ef3befb1e4bba58c33522533ecf1e11fd470',
  'symfony/framework-bundle' => 'v4.2.12@ac12bd9f104bb2dc319b09426e767ecfa95688da',
  'symfony/http-foundation' => 'v4.2.12@2ae778ff4a1f8baba7724db1ca977ada3b796749',
  'symfony/http-kernel' => 'v4.2.12@8a7c5ef599466af6e972c705507f815df9c490ae',
  'symfony/inflector' => 'v4.2.12@275e54941a4f17a471c68d2a00e2513fc1fd4a78',
  'symfony/intl' => 'v4.2.12@94aed330eda5cfe171bbd596d898c065e94c132f',
  'symfony/monolog-bridge' => 'v4.2.12@41b01701e23016b920638ed551c53f077daacefd',
  'symfony/monolog-bundle' => 'v3.5.0@dd80460fcfe1fa2050a7103ad818e9d0686ce6fd',
  'symfony/options-resolver' => 'v4.2.12@eda69aac1ea1f97a594dd9a5c64b7ff73a37ade2',
  'symfony/orm-pack' => 'v1.0.7@c57f5e05232ca40626eb9fa52a32bc8565e9231c',
  'symfony/polyfill-intl-icu' => 'v1.13.0@b3dffd68afa61ca70f2327f2dd9bbeb6aa53d70b',
  'symfony/polyfill-intl-idn' => 'v1.13.0@6f9c239e61e1b0c9229a28ff89a812dc449c3d46',
  'symfony/polyfill-mbstring' => 'v1.13.0@7b4aab9743c30be783b73de055d24a39cf4b954f',
  'symfony/polyfill-php72' => 'v1.13.0@66fea50f6cb37a35eea048d75a7d99a45b586038',
  'symfony/process' => 'v4.2.12@808a4be7e0dd7fcb6a2b1ed2ba22dd581402c5e2',
  'symfony/property-access' => 'v4.2.12@c3532a4bdb785446970148da68e03dc11514e256',
  'symfony/property-info' => 'v4.2.12@c5d4e006eb3fb386c5b68cd3b1dbb3f0cc6516df',
  'symfony/routing' => 'v4.2.12@1174ae15f862a0f2d481c29ba172a70b208c9561',
  'symfony/security-bundle' => 'v4.2.12@d731987aabf6b28b86faeb158973b0d0c22a0a09',
  'symfony/security-core' => 'v4.2.12@3ec42b5dbeee143715da686539751ea762dd8564',
  'symfony/security-csrf' => 'v4.2.12@ff004ea4d215fd4a740f6d6ca9643ff92326c16c',
  'symfony/security-guard' => 'v4.2.12@ef6d700e6be1ca75bc2788068c62506ab11461bd',
  'symfony/security-http' => 'v4.2.12@8024422eeaca7b0b33ce2900b2f75e20259de7aa',
  'symfony/serializer' => 'v4.2.12@8a2974c10e8eb8eb2d36a28c1bd68eb0b411cc60',
  'symfony/serializer-pack' => 'v1.0.2@c5f18ba4ff989a42d7d140b7f85406e77cd8c4b2',
  'symfony/stopwatch' => 'v4.2.12@b1a5f646d56a3290230dbc8edf2a0d62cda23f67',
  'symfony/swiftmailer-bundle' => 'v3.3.1@defa9bdfc0191ed70b389cb93c550c6c82cf1745',
  'symfony/translation' => 'v4.2.12@4b84015894d980745b510ba90492722cafe2f90f',
  'symfony/twig-bridge' => 'v4.2.12@708a993aaf3b979738d6e0a12bf157f02fc94998',
  'symfony/twig-bundle' => 'v4.2.12@db06490aeabba37dfc55a53fbf901c75e0d4f7b0',
  'symfony/validator' => 'v4.2.12@7b4485db55b7ea1a0d13d126c2781313017f815f',
  'symfony/var-exporter' => 'v4.2.12@f5be0592bb191debd278cf7e16413df0c978de8f',
  'symfony/web-link' => 'v4.2.12@47b8188b4bb8d24eef0bb287b0737d5b84a6cab8',
  'symfony/webpack-encore-bundle' => 'v1.7.2@787c2fdedde57788013339f05719c82ce07b6058',
  'symfony/yaml' => 'v4.2.12@9468fef6f1c740b96935e9578560a9e9189ca154',
  'twig/twig' => 'v2.12.2@d761fd1f1c6b867ae09a7d8119a6d95d06dc44ed',
  'webmozart/assert' => '1.6.0@573381c0a64f155a0d9a23f4b0c797194805b925',
  'zendframework/zend-code' => '3.4.0@46feaeecea14161734b56c1ace74f28cb329f194',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'easycorp/easy-log-handler' => 'v1.0.9@224e1dfcf9455aceee89cd0af306ac097167fac1',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'symfony/browser-kit' => 'v4.2.12@3659f10d13d270b77506006bdf9250cac9268156',
  'symfony/css-selector' => 'v4.2.12@48eddf66950fa57996e1be4a55916d65c10c604a',
  'symfony/debug-bundle' => 'v4.2.12@7ad133ba7c5c932bca671d118aa634cd77ebb39f',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dom-crawler' => 'v4.2.12@ba1da8fb10291714b8db153fcf7ac515e1a217bb',
  'symfony/maker-bundle' => 'v1.14.3@c864e7f9b8d1e1f5f60acc3beda11299f637aded',
  'symfony/phpunit-bridge' => 'v5.0.0@3c288a1f1a46ddffc299fd46ddb643d50debde85',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/var-dumper' => 'v4.2.12@4e18e041a477edbb8c54e053f179672f9413816c',
  'symfony/web-profiler-bundle' => 'v4.2.12@e7b916235f8a1d33010ab707fb08943cf8573c1e',
  'symfony/web-server-bundle' => 'v4.2.12@91945ba7f59f2a4b4194f018da9d7aaedaf88418',
  'paragonie/random_compat' => '2.*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  'symfony/polyfill-ctype' => '*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  'symfony/polyfill-iconv' => '*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  'symfony/polyfill-php71' => '*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  'symfony/polyfill-php70' => '*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  'symfony/polyfill-php56' => '*@b570a60c50a8f79f662b120af8afdd5198f4a353',
  '__root__' => 'dev-master@b570a60c50a8f79f662b120af8afdd5198f4a353',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
