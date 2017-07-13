<?php
/*
 * Template Name: Home page
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header(); ?>

    <div class="head-block">
        <div class="head-block__title">Сэкономьте <strong>до 40%</strong> от сметы, <span>покупая черепицу у импортера</span></div>
        <div class="head-block__info">С доставкой по Украине <span>за 24 часа</span></div>
    </div>

    <div class="application">
        <div class="container">
            <div class="row">
                <div class="xl-4 lg-12 text-xs-center text-xl-left">
                    <div class="form-title">
                        <h4>Оставьте заявку</h4>
                        <p>На Бесплатную консультацию<br>или расчет сметы</p>
                    </div>
                </div>

                <?php echo do_shortcode('[contact-form-7 id="8" title="application"]'); ?>
            </div>
        </div>
    </div>

    <div class="benefits">
        <div class="container">
            <?php $class_benefits = 'benefits__item wow fadeIn'; ?>
            <div class="<?php echo $class_benefits; ?>" data-wow-delay="0.2s" >
                <div class="icon"></div>
                <h4>Гарантия от</h4>
                <span>100 Лет</span>
            </div>

            <div class="<?php echo $class_benefits; ?>" data-wow-delay="0.4s" >
                <div class="icon"></div>
                <h4>В наличии на складе</h4>
                <span>4600 м<sup>2</sup></span>
            </div>

            <div class="<?php echo $class_benefits; ?>" data-wow-delay="0.6s">
                <div class="icon"></div>
                <h4>Цены от</h4>
                <span>90 грн</span>
            </div>

            <div class="<?php echo $class_benefits; ?>" data-wow-delay="0.8s">
                <div class="icon"></div>
                <h4>В ассортименте</h4>
                <span>12 производителей</span>
            </div>

            <i class="benefits__dot nth-1"></i>
            <i class="benefits__dot nth-2"></i>
            <i class="benefits__dot nth-3"></i>
            <i class="benefits__dot nth-4"></i>
            <i class="benefits__dot nth-5"></i>
        </div>
    </div>

    <div class="assortment">
        <div class="container">
            <div class="assortment__title">Наш ассортимент:</div>

            <div class="row">
                <div class="xl-3 lg-4">
                    <div class="assortment__subtitle text-xs-center text-sm-left">Выберите производителя:</div>
                    <?php get_template_part( 'template-parts/categories' ); ?>
                </div>

                <div class="xl-6 lg-8 hidden-xs-down">
                    <div class="assortment__demonstration">
                        <div class="assortment__demonstration--title">Подберите идеальную для вас черепицу:</div>
                        <div class="roof"></div>
                        <div class="home-facade"><img src="" alt="Facade" /></div>
                    </div>
                </div>

                <div class="xl-3 lg-12 hidden-xs-down">
                    <div class="assortment__subtitle">Выберите цвет фасада:</div>
                    <div class="selected-color">
                        <span>Выбранный цвет:</span>
                        <div class="selected-color__name"></div>
                    </div>
                    <?php get_template_part( 'template-parts/facade' ); ?>
                </div>
            </div>


            <div class="assortment__slider">
                <div class="assortment__subtitle text-xs-center">Выберите стиль черепицы:</div>

                <div id="response"></div>
                <div class="loading"></div>
            </div>

        </div>

        <?php
        add_action( 'wp_footer', 'action_function_assort', 20 );
        function action_function_assort() {
        ?>
        <script>
        jQuery(document).ready(function($){

            /* Ajax */
            var ajaxurl  = '<?php echo admin_url('admin-ajax.php'); ?>';

            function sendForm(){
                var dataForm = jQuery.param($('.assortment-cat').serializeArray()),
        		    data     = {
            			'action': 'myfilter',
            			'query': dataForm
        		    };

        		$.ajax({
        			url:ajaxurl,
        			data:data, // form data
        			type:'POST', // POST
        			beforeSend:function(xhr){
        				$('.loading').addClass('opload');
        			},
        			success:function(data){
        				$('.loading').removeClass('opload');
        				$('#response').html(data);
        			}
        		});

            };

            if('.brand:checked') {
                sendForm();
            }

            $('.assortment-cat').find('select, input').change(function(){
                sendForm();
            });

        });
        </script>
        <?php } ?>

<!--        <div class="assortment__price-discount">
            <a href="#"><strong>Получить полный прайс</strong>(файл .xls)</a>
            <button>Получить персональную скидку</button>
        </div>-->

        <div class="assortment__price-discount-form">
            <div class="container">
                <div class="row">
                    <div class="xl-4 lg-12 text-xs-center text-xl-left">
                        <div class="form-title">
                            <h4>Персональная скидка</h4>
                            <p>от 10% до 50%</p>
                        </div>
                    </div>

                    <?php echo do_shortcode('[contact-form-7 id="67" title="discount"]'); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="trust">
        <div class="container">
            <div class="trust__title">
                <span>
                    <h4>Почему нам доверили поставки <strong>более 700 клиентов,</strong></h4>
                    <p>67% из которых - регулярно закупающие материалы строители и строительные компнаии.</p>
                </span>
            </div>

            <div class="row hidden-sm-down">
                <div class="xl-5 md-6">
                    <div class="trust__other-title">В других компаниях:</div>
                </div>

                <div class="xl-5 offset-xl-1 md-6 offset-md-0">
                    <div class="trust__we-title">Как мы работаем:</div>
                </div>
            </div>

            <div class="trust__list">
                <p class="list-other wow flipInX">Чтобы уменьшить стоимость сметы, заменяют оригинальные комплектующие дешевыми аналогами, что уже через год может обернутся серьёзными проблемами: конденсат, плесень, течь и т.п.</p>
                <p class="list-we wow flipInX">Мы гарантируем оригинальность и качество комплектующих доставляемых на объект и их соответствие номенклатуры в договоре.</p>

                <p class="list-other wow flipInX">Предлагают тот материал, который им выгоднее продавать, либо тяжелее промониторить цену.</p>
                <p class="list-we wow flipInX">Для нас важнее прибыли -  подобрать материал, соответствующий целям объекта, Вашим требованиям и бюджету. С нашим ассортиментом и опытом Вы получите оптимальную смету.</p>
                <p class="list-other wow flipInX">Смету считает менеджер, а не инженер, что приводит либо к остаткам материаилов на объекте, либо к дозаказу. Как следствие, Вы переплачиваете либо за лишний материал, либоза доставку повторного заказа и простой строителей.</p>
                <p class="list-we wow flipInX">Наш опытный инженер просчитает смету с минимальным количеством отходов. Одна и та же крыша может быть посчитана с разницей до нескольких тысяч гривен.</p>

                <p class="list-other wow flipInX">Карнизные и фронтонные планки поставляют из стали ниже второго класса оцинкования. (менее 142,5 г./м.кв.)  и толщиной ниже 0,45мм., что приводит к коррозии и дорогостоящему ремонту кровли. Хотя в смете цену ставят как за качественные планки. Ведь на вид их отличить сможет только профессионал.</p>
                <p class="list-we wow flipInX">Мы производим планки только из металла 1-го класса оцинкования (более 258г./м.кв.) и толщиной более 0,45мм. За исключением тех случаев, когда заказчик сознательно идет на такую экономию. Например, для кровли временного сооружения.</p>

                <p class="list-other wow flipInX">Предлагают тот материал, который им выгоднее продавать, либо тяжелее промониторить цену.</p>
                <p class="list-we no-line wow flipInX"><strong>Отвечаем на заявку в течение 5 минут.</strong>Расчет и коммерческое предложение не более 3-х часов.</p>
            </div>

        </div>
    </div>

    <div class="calculation">
        <div class="container">
            <div class="row">
                <div class="xl-4 lg-12 pull-xl-right text-xs-center text-xl-left">
                    <div class="form-title-2">
                        <h4>Бесплатный расчет стоимости материалов под ваш проект</h4>
                    </div>
                </div>

                <?php echo do_shortcode('[contact-form-7 id="50" title="calculation"]'); ?>
            </div>
        </div>
    </div>

    <div class="materials">
        <div class="container">
            <div class="title-block-2">Кроме битумный черепицы, у нас есть все, что необходимо для кровли</div>
            <div class="materials__subtitle wow flipInX">Начиная от водостоков и систем вентиляции, заканчивая флюгерами и громоотводами</div>

            <div class="row">
                <div class="xl-8 offset-xl-2 lg-8 offset-lg-2">
                    <div class="materials__wrap">
                        <img class="wow pulse" src="<?php echo Beyond::$template_dir_url; ?>/assets/images/home-drop.png" alt="">

                        <div class="materials__item list-1 wow flipInX">Мансардные<br>окна</div>
                        <div class="materials__item list-2 wow flipInX">Водосточные<br>системы</div>
                        <div class="materials__item list-3 wow flipInX">Системы<br>анти-обледенения</div>
                        <div class="materials__item list-4 wow flipInX">Вентиляционные<br>системы</div>
                        <div class="materials__item list-5 wow flipInX">Карнизная<br>подшивка (Софит)</div>
                        <div class="materials__item list-6 wow flipInX">Гидро-паро<br>изоляция</div>
                        <div class="materials__item list-7 wow flipInX">Комплектующие<br>для кровли</div>
                    </div>
                </div>
            </div>
            <div class="materials__subtitle wow flipInX">а также  дымоходы, чердачные лестницы и многое другое...</div>
        </div>
    </div>

    <div class="results">
        <div class="container">
            <div class="title-block">Некоторые <strong>результаты нашей работы</strong></div>

            <div class="row">
                <div class="lg-4">
                    <div class="results__item item-icon-1">Доставка 315м<sup>2</sup> битумной черепицы Katepal и комплектующих на объект за 1 час, когда клиента подвела компания-конкурент и горели сроки.</div>
                </div>

                <div class="lg-4">
                    <div class="results__item item-icon-2">г. Бердянск<br>Площадь кровли 300м<sup>2</sup><br>Срок выполнения 6 недель<br>Задача: проектирование кровли, установка стропильной системы, монтаж битумной черепицы Tegola, утепление кровли, монтаж водосточной системы, установка софита.</div>
                </div>

                <div class="lg-4">
                    <div class="results__item item-icon-3">Выиграли тендер на поставку 3200м<sup>2</sup> черепицы Ruflex для котеджного поселка в г. Одесса.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="gratitude">
        <div class="container">
            <div class="title-block">Наши благодарные клиенты</div>

            <div class="gratitude-slider">
            <?php
            $gratitude = new WP_Query( array(
                'post_type' => 'gratitude',
                'posts_per_page' => 9999,
	        ));
            if( $gratitude->have_posts() ) :
        		while( $gratitude->have_posts() ): $gratitude->the_post();
                $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), 'full' );
            ?>
                <div>
                    <div class="gratitude__img">
                        <img src="<?php echo $image_attributes[0] ?>" alt="<?php the_title_attribute(); ?>" />
                    </div>
                </div>
            <?php
                endwhile; wp_reset_postdata();
            endif;
            ?>
            </div>
        </div>
    </div>

    <div class="estimate">
        <div class="container">
            <div class="row">
                <div class="xl-6 offset-xl-1 lg-7 offset-lg-0">
                    <div class="estimate__item">
                        <div class="estimate__title">Уже имеете смету <span>Другой компании?</span></div>
                        <p>Давайте проверим, нет ли подмены неоригинальными комплектующими или завышенной стоимости.</p>
                        <p>Не пытаются ли вам продать то, что не нужно.</p>
                        <p>Нет ли зговора между монтажниками и кровельной компанией.</p>
                        <p>И даже если вам просчитали все правильно - <strong>мы свое предложение сделаем лучше.</strong></p>
                    </div>
                </div>
            </div>

            <div class="estimate__subimg wow fadeInUpBig" data-wow-duration="2.5s"></div>
        </div>

        <div class="estimate__form">
            <div class="container">
                <div class="row">
                    <div class="xl-4 lg-12 pull-xl-right text-xs-center text-xl-left">
                        <div class="form-title-2">
                            <h4>Отправьте смету<br>на проверку</h4>
                        </div>
                    </div>

                    <?php echo do_shortcode('[contact-form-7 id="58" title="estimate"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="rewards">
        <div class="container">
            <div class="title-block"><strong>Мы профессионалы</strong> своего дела</div>

            <div class="row">
                <div class="lg-6">
                    <div class="rewards__text">
                        <p>Наша сила в специализации.<br>Мы занимаемся только кровлями.</p>
                        <p>Наша компания является официальным дилером самых известных торговых марок на территории Украины.</p>
                        <p>Мы также предоставляем полный комплекс услуг по проектированию, продаже и монтажу кровли из битумной черепицы. Кроме этого, мы делаем доставку битумной черепицы и комплектующих по Запорожью в течение дня, либо в течение суток по Украине.</p>
                        <p>Мы не просто "менеджеры на телефонах". Мы практики. Все, что мы рекомендуем и предлагаем, взято из опыта проектирования, продажи, монтажа и эксплуатации кровель.</p>
                        <p>Мы продаём кровельные материалы уже более семи лет. Различные типы покрытий и вариантов комплектации, которые мы можем предложить клиенту, всегда дают нам возможность находить общий язык с нашими покупателями.</p>
                    </div>
                </div>

                <div class="lg-6">
                    <div class="rewards__scan">
                        <div class="row">
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                            <div class="xl-4 lg-6 md-4 xs-6">
                                <div class="rewards__scan--img">
                                    <img src="<?php echo Beyond::$template_dir_url; ?>/assets/images/scan.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expenses">
        <div class="container">
            <div class="title-block-2 max-wight">Оставьте заявку на профессиональный просчет расхода материала и подбор комплектующих</div>

            <div class="row">
                <div class="xl-4 offset-xl-1">
                    <?php echo do_shortcode('[contact-form-7 id="59" title="expenses"]'); ?>
                    <div class="form-title-3">Оставив заявку в течении 2-х часов, вы получите:</div>
                </div>

                <div class="xl-6">
                    <div class="expenses__text">
                        <p>Мы продаем не просто материал. Мы продаем комплексное решение вопроса исходя из специфики кровли и бюджета. Сначала просчитываем размеры и площади кровли.</p>
                        <p>Потом исходя из пожеланий клиента и его бюджета подбираем материал. Укомплектовываем кровлю всеми необходимыми материалами, задача которых максимально продлить срок службы кровли.</p>
                        <ul>
                            <li>Помощь эксперта в подборе материала</li>
                            <li>Профессиональный просчет расхода материала</li>
                            <li>Качественный просчет количества комплектующих, что ведет к минимальным отходам</li>
                            <li>Экспертную консультацию нашего специалиста</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>