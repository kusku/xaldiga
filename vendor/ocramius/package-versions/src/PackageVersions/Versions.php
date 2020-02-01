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
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.8.0@904dca4eb10715b92569fbcd79e201d5c349b6bc',
  'doctrine/cache' => '1.10.0@382e7f4db9a12dc6c19431743a2b096041bcdd62',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => '2.12.0@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => 'v2.10.1@c2b8e6e82732a64ecde1cddf9e1e06cb8556e3d8',
  'doctrine/doctrine-bundle' => '2.0.7@6926771140ee87a823c3b2c72602de9dda4490d3',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.1@a3987131febeb0e9acb3c47ab0df0af004588934',
  'doctrine/orm' => 'v2.7.0@4d763ca4c925f647b248b9fa01b5f47aa3685d62',
  'doctrine/persistence' => '1.3.6@5dd3ac5eebef2d0b074daa4440bb18f93132dee4',
  'doctrine/reflection' => 'v1.1.0@bc420ead87fdfe08c03ecc3549db603a45b06d4c',
  'egulias/email-validator' => '2.1.15@e834eea5306d85d67de5a05db5882911d5b29357',
  'fig/link-util' => '1.1.0@47f55860678a9e202206047bc02767556d298106',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'monolog/monolog' => '1.25.3@fa82921994db851a8becaf3787a9e73c5976b6f1',
  'ocramius/package-versions' => '1.4.2@44af6f3a2e2e04f2af46bcb302ad9600cba41c7d',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.4@da3fd972d6bafd628114f7e7e036f45944b62e9c',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.2@446d54b4cb6bf489fc9d75f55843658e6f25d801',
  'sensio/framework-extra-bundle' => 'v5.5.3@98f0807137b13d0acfdf3c255a731516e97015de',
  'swiftmailer/swiftmailer' => 'v6.2.3@149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
  'symfony/asset' => 'v4.3.11@5bdbd8878b69e3be16d036890ea3081172ea28c5',
  'symfony/cache' => 'v4.3.11@8794ccf68ac341fc19311919d2287f7557bfccba',
  'symfony/config' => 'v4.3.11@7b7d5d35a5ba5a62f2c6c69f574e36595e587d11',
  'symfony/console' => 'v4.3.11@82aeab8f852a63e83d781617841237944392cd45',
  'symfony/contracts' => 'v1.1.8@f51bca9de06b7a25b19a4155da7bebad099a5def',
  'symfony/debug' => 'v4.4.0@b24b791f817116b29e52a63e8544884cf9a40757',
  'symfony/dependency-injection' => 'v4.3.11@468bfb60a60b7caa03e4722c43f5359df47b4349',
  'symfony/doctrine-bridge' => 'v4.3.11@64cbcf5635fb1b38131332d0b3784faeec9a9e9a',
  'symfony/dotenv' => 'v4.3.11@3e41dc2a3c517819b23cb4d1c95f5116182a8dd0',
  'symfony/event-dispatcher' => 'v4.3.11@75f99d7489409207d09c6cd75a6c773ccbb516d5',
  'symfony/expression-language' => 'v4.3.11@fcc3e2085e4832f52bed94d72663962f650dfb23',
  'symfony/filesystem' => 'v4.3.11@fdc0ac5e64f7555818411a17993bb24be4270769',
  'symfony/finder' => 'v4.3.11@8174c13b932c71f10cdd8dfcd8f5e494f1e7003d',
  'symfony/flex' => 'v1.6.2@e4f5a2653ca503782a31486198bd1dd1c9a47f83',
  'symfony/form' => 'v4.3.11@05fac4992a100642806a50cc0c84fb4a8a326c14',
  'symfony/framework-bundle' => 'v4.3.11@4ea8f63e005af800e140c1bcfb1f748a006defd1',
  'symfony/http-foundation' => 'v4.3.11@90af881cedc857dca17990cae96f37727b8ae1d6',
  'symfony/http-kernel' => 'v4.3.11@fcd8fe5b98d435da856b310a01a4f281668607c0',
  'symfony/inflector' => 'v4.3.11@8c699257379098d26fa400edad29f703b380efcf',
  'symfony/intl' => 'v4.3.11@2d139d02ddae582c382d30cccd2ee4c814043518',
  'symfony/mime' => 'v4.3.11@50f65ca2a6c33702728024d33e4b9461f67623c4',
  'symfony/monolog-bridge' => 'v4.3.11@8c6a51c55add464d9e6ef7000f1877e4c75f9fbf',
  'symfony/monolog-bundle' => 'v3.5.0@dd80460fcfe1fa2050a7103ad818e9d0686ce6fd',
  'symfony/options-resolver' => 'v4.3.11@3438c6fe65a9794b0e9f3686d0e3771412a2c47a',
  'symfony/orm-pack' => 'v1.0.7@c57f5e05232ca40626eb9fa52a32bc8565e9231c',
  'symfony/polyfill-intl-icu' => 'v1.13.1@b3dffd68afa61ca70f2327f2dd9bbeb6aa53d70b',
  'symfony/polyfill-intl-idn' => 'v1.13.1@6f9c239e61e1b0c9229a28ff89a812dc449c3d46',
  'symfony/polyfill-mbstring' => 'v1.13.1@7b4aab9743c30be783b73de055d24a39cf4b954f',
  'symfony/polyfill-php72' => 'v1.13.1@66fea50f6cb37a35eea048d75a7d99a45b586038',
  'symfony/polyfill-php73' => 'v1.13.1@4b0e2222c55a25b4541305a053013d5647d3a25f',
  'symfony/process' => 'v4.3.11@61ab103012c3072fb340447a34598714ba74ba6f',
  'symfony/property-access' => 'v4.3.11@28ecead27bd17937b3f904396b026a8e3915d0cd',
  'symfony/property-info' => 'v4.3.11@169aafe8f2a01ec50fb324f5d24bbd61a5799df1',
  'symfony/routing' => 'v4.3.11@6cc4b6a92e3c623b2c7e56180728839b0caf8564',
  'symfony/security-bundle' => 'v4.3.11@1cc02bd8e44eef0bd4ecfd53a8b4d7b26f675d85',
  'symfony/security-core' => 'v4.3.11@8d008438e4bbdf04086d1048d51cc1b5dfac2046',
  'symfony/security-csrf' => 'v4.3.11@9e435026ab45f073880d1fbe0e1b17e7df6bf642',
  'symfony/security-guard' => 'v4.3.11@5d87ee4ffa5aa6e594008fa3cc65bc8f86ad6438',
  'symfony/security-http' => 'v4.3.11@2b4b8632956c680400006376fad0a4f9889d4be1',
  'symfony/serializer' => 'v4.3.11@cd4f545209e1f3d408b5adda729c59bfd714a1a5',
  'symfony/serializer-pack' => 'v1.0.2@c5f18ba4ff989a42d7d140b7f85406e77cd8c4b2',
  'symfony/stopwatch' => 'v4.3.11@4aff3715c98706ee25bdb4aced6591a9dffc3d9b',
  'symfony/swiftmailer-bundle' => 'v3.4.0@553d2474288349faed873da8ab7c1551a00d26ae',
  'symfony/translation' => 'v4.3.11@46e462be71935ae15eab531e4d491d801857f24c',
  'symfony/twig-bridge' => 'v4.3.11@9574613b74ed066f775eaf94bb15476ef58609de',
  'symfony/twig-bundle' => 'v4.3.11@0471344717bfb081f10209ad6b8fd520ca8ebd9d',
  'symfony/validator' => 'v4.3.11@0d2dcf4ae26db5b6781f40fcab9785f427ee7fa4',
  'symfony/var-exporter' => 'v4.3.11@563f728784ea09c8154ea57cf8192ae5d6f0d277',
  'symfony/web-link' => 'v4.3.11@5f47af858f264ce1d29388fb2a05f54e3c687794',
  'symfony/webpack-encore-bundle' => 'v1.7.3@5c0f659eceae87271cce54bbdfb05ed8ec9007bd',
  'symfony/yaml' => 'v4.3.11@8e0a95493b734ca8195acf3e1f3d89e88b957db5',
  'twig/twig' => 'v2.12.3@97b6311585cae66a26833b14b33785f5797f7d39',
  'webmozart/assert' => '1.6.0@573381c0a64f155a0d9a23f4b0c797194805b925',
  'zendframework/zend-code' => '3.4.1@268040548f92c2bfcba164421c1add2ba43abaaa',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'doctrine/data-fixtures' => '1.4.2@39e9777c9089351a468f780b01cffa3cb0a42907',
  'doctrine/doctrine-fixtures-bundle' => '3.3.0@8f07fcfdac7f3591f3c4bf13a50cbae05f65ed70',
  'easycorp/easy-log-handler' => 'v1.0.9@224e1dfcf9455aceee89cd0af306ac097167fac1',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'symfony/browser-kit' => 'v4.3.11@66d301ce3458b522e3b1f2a76ecfccd1834dcf90',
  'symfony/css-selector' => 'v4.3.11@32203e7cc318dcfd1d5fb12ab35e595fc6016206',
  'symfony/debug-bundle' => 'v4.3.11@37f558ddd74933f0254bb5e3b6b758e1ee7ff699',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dom-crawler' => 'v4.3.11@ccf895f6f3ed9430f53ae1ce34566e9bb6c58446',
  'symfony/maker-bundle' => 'v1.14.3@c864e7f9b8d1e1f5f60acc3beda11299f637aded',
  'symfony/phpunit-bridge' => 'v5.0.4@38959f0ef4cea3e003f94c670bca89b2f4d932c5',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/var-dumper' => 'v4.3.11@75669a7e681cbd4a291a08ed31d2d3998fe86e48',
  'symfony/web-profiler-bundle' => 'v4.3.11@ef55f4aac938cdf8c2051ead22e18ad80ed4e4f8',
  'symfony/web-server-bundle' => 'v4.3.11@2338445b78f1fb212a96f4286abdc77ee1e92607',
  'paragonie/random_compat' => '2.*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  'symfony/polyfill-ctype' => '*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  'symfony/polyfill-iconv' => '*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  'symfony/polyfill-php71' => '*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  'symfony/polyfill-php70' => '*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  'symfony/polyfill-php56' => '*@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
  '__root__' => 'dev-master@d8a32bd449017fefba1b53d7bc6deeba2e18c8fb',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
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
