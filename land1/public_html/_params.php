<?php
$metrika_code = null;
$google_code = null;
$send_utm = null;
switch (dirname(__FILE__)) {
    case '/Users/citrusplus01/Sites/citlands/newcitrusland':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $site = 'newcitrusland';
        $from = 'newcitrusland@citrusfit.ru';
        $to = array(
//    'sales@dub-floor.ru',
            'vn.gerasimov@citrus-plus.ru',
        );
        $mode="dev_mode";
        function datePlus($day=0)
        {
            $formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
            $formatter->setPattern('d MMMM');
            $formatter->format($time = new DateTime());//руссифицированная версия текущей даты
            echo $formatter->format($time->add(new DateInterval('P'.$day.'D')));//вывод даты с плюсом в днях
        };
        break;
    default:
        include('yametrika.php');
        $site = 'land1.citrusfit.ru';

        $from = 'newcitrusland@citrusfit.ru';
        $to = array(
            'pv.danilov.dev@yandex.ru',
            'sales@citrusfit.ru'
        );
        $send_utm = str_replace('"', "'", (json_encode($_GET))); // отправка утм меток в обработчик письма.
        //$amocrm_status_request = '8309196';
        //$amocrm_subdomain = 'citrusfit';
        //$amocrm_login = 'a.p.v@inbox.ru';
        //$amocrm_hash = '5af52d63442678121e3431130357c734';
        //
        $metrika_id = '37974660';
        $metrika_code = '<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter'.$metrika_id.' = new Ya.Metrika({
                    id: '.$metrika_id.'
                    , clickmap: true
                    , trackLinks: true
                    , accurateTrackBounce: true
                    , webvisor: true
                    , trackHash: true
                });
            } catch (e) {}
        });
        var n = d.getElementsByTagName("script")[0]
            , s = d.createElement("script")
            , f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/'.$metrika_id.'" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->';
        $metrika_form_submit_target = "yaCounter" . $metrika_id . ".reachGoal('FORM_SUBMIT'); return true;";

        $google_id = 'UA-78969589-2';
        $google_code = '<!-- Код тега ремаркетинга Google -->
        <!--------------------------------------------------
        С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
        --------------------------------------------------->
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 962541576;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/962541576/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
        </noscript>';

        $google_analitics = "<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '".$google_id."', 'auto');
        ga('send', 'pageview');

        </script>";
        function datePlus($day=0)
        {
            $formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
            $formatter->setPattern('d MMMM');
            $formatter->format($time = new DateTime());//руссифицированная версия текущей даты
            echo $formatter->format($time->add(new DateInterval('P'.$day.'D')));//вывод даты с плюсом в днях
        };
        break;
}
