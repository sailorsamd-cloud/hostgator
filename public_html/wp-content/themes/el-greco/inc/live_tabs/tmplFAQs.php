<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Frequently Asked Questions', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input(__( 'Heading', 'elgreco' ),'tp_faq_head','',$data);
            cb_textarea(__( 'Text', 'elgreco' ),'tp_faq_text','',$data);

            ?>
            <div class="add_list">
                <?php
                foreach ($data['faqs'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_input(__( 'Question', 'elgreco' ),'question',$key,$val,'faqs['.$key.']', '', '', '');
                    cb_input(__( 'Answer', 'elgreco' ),'answer',$key,$val,'faqs['.$key.']', '', '', '');
                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="faqs" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="faqs">Add</div>
            </div>
            <div class="data_source">
                <i data-type="cb_input" data-name="<?php _e( 'Question', 'elgreco' ); ?>" data-var="question"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Answer', 'elgreco' ); ?>" data-var="answer"></i>
            </div>

            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>