<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

?>

<footer class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="site-footer__contacts">
        <div class="container">
            <div class="title-block">Контакты:</div>

            <div class="row">
                <div class="xl-8 offset-xl-2">
                    <div class="row">
                        <div class="lg-4 md-6">
                            <div class="site-footer__item">
                                <div class="title">Контакт центр:</div>
                                <?php
                                $contact_center = ld_options( 'contact-center' );
                                if(!empty($contact_center)) {
                                    foreach($contact_center as $tel) {
                                        $tel_link = preg_replace('/[^0-9]/', '', $tel);
                                        echo '<a class="tel" href="tel:'.$tel_link.'">'.$tel.'</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="lg-4 md-6">
                            <div class="site-footer__item">
                                <div class="title">Отдел кадров:</div>

                                <div class="place">HR-менеджер<br>Колпакова Наталья</div>
                                <?php
                                $otdel_kadrov = ld_options( 'otdel-kadrov' );
                                if(!empty($otdel_kadrov)) {
                                    foreach($otdel_kadrov as $tel) {
                                        $tel_link = preg_replace('/[^0-9]/', '', $tel);
                                        echo '<a class="tel" href="tel:'.$tel_link.'">'.$tel.'</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="lg-4 md-6">
                            <div class="site-footer__item">
                                <div class="title">Бухгалтер:</div>

                                <div class="place">Главный бухгалтер<br>Горовенко Тамила Николаевна</div>
                                <?php
                                $bugalter = ld_options( 'bugalter' );
                                if(!empty($bugalter)) {
                                    foreach($bugalter as $tel) {
                                        $tel_link = preg_replace('/[^0-9]/', '', $tel);
                                        echo '<a class="tel" href="tel:'.$tel_link.'">'.$tel.'</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="lg-7 md-6">
                            <div class="site-footer__item">
                                <div class="title">График работы:</div>

                                <div class="place">
                                    <b>Пн-Пт с 9:00 до 18:00</b>
                                    Не важно на какой стадии находится Ваш проект. Если Вы собираетесь приступить к строительству или ремонту собственного дома или просто сомневаетесь в проекте, который уже есть - <strong>звоните нам!</strong>
                                </div>
                            </div>
                        </div>

                        <div class="lg-5 md-6">
                            <div class="site-footer__item">
                                <div class="title">Руководство компании:</div>

                                <?php $rukovodit_1 = ld_options( 'rukovodit-1' ); echo $rukovodit_1; ?>
                                <br>
                                <?php $rukovodit_2 = ld_options( 'rukovodit-2' ); echo $rukovodit_2; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="map"></div>
    <?php $location = get_field('google_map'); ?>
    <script>
    function initMap() {
      var arsenal = {lat: <?php echo $location['lat'] ?>, lng: <?php echo $location['lng'] ?>};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        scrollwheel: false,
        center: arsenal
      });

      var contentString = '<div class="icon-map"><img src="<?php echo Beyond::$template_dir_url . "/assets/images/logo.png"; ?>" alt="" /><p><?php echo $location["address"] ?></p></div>';

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });

      var image = '<?php echo Beyond::$template_dir_url . '/assets/images/point.png'; ?>';
      var marker = new google.maps.Marker({
        position: arsenal,
        map: map,
        title: '<?php echo $location['address'] ?>',
        icon: image
      });
      //marker.addListener('click', function() {
        infowindow.open(map, marker);
      //});
    }
    </script>


    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="lg-5">
                    <div class="copyright__item">
                        &copy; 2007-<span itemprop="copyrightYear"><?php echo date('Y'); ?></span> DobroBud. Все права защищены.
                    </div>
                </div>

                <div class="lg-3">
                    <div class="copyright__social">
                        <a class="fb" href="#"></a>
                        <a class="vk" href="#"></a>
                        <a class="in" href="#"></a>
                    </div>
                </div>

                <div class="lg-4">
                    <div class="copyright__developer">Сайт разработан агентством <a href="http://promotactic.biz/" target="_blank">«PromoTactic»</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
    <!-- Google Analytics counter --><!-- /Google Analytics counter -->


    <?php wp_footer(); ?>
</body>

</html>