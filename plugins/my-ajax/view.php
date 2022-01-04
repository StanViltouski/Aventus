
                    <div class="estateContent_card">
                        <div class="card_img">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="card img" /></a>
                        </div>

                        <div class="card_title"><span class="title-h4"><?php esc_html(the_title()); ?></span></div>

                        <div class="card_desc">
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Адрес</span></div>
                                <?php $estate_address= get_field( 'address' ) ?>
                                    <?php if ( $estate_address ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_address )); ?></span></div>
                                <?php endif ?>
                            </div>

                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Площадь</span></div>
                                <?php $estate_area= get_field( 'area' ) ?>
                                    <?php if ( $estate_area ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_area )); ?>м<sup>2</sup></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Жилая площадь</span></div>
                                <?php $estate_space= get_field( 'living_space' ) ?>
                                    <?php if ( $estate_space ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_space )); ?>м<sup>2</sup></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Этаж</span></div>
                                <?php $estate_floor= get_field( 'floor' ) ?>
                                    <?php if ( $estate_floor ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_floor )); ?></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Стоимость</span></div>
                                <?php $estate_cost = get_field( 'cost' ) ?>
                                    <?php if ( $estate_cost ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_cost )); ?></span></div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
