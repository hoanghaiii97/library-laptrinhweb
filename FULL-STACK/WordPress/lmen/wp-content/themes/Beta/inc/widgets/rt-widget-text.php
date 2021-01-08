<?php
add_action('widgets_init', 'text_widgets');

function text_widgets()
{
    register_widget('RT_Widget_Text');
}

class RT_Widget_Text extends WP_Widget {

    function RT_Widget_Text()
    {
        $widget_ops = array('classname' => 'rt_textwidget', 'description' => __('Thêm Widget Văn bản','rt-theme'));
        $control_ops = array('id_base' => 'rt-widget-text');
        $this->WP_Widget('rt-widget-text', __('RT - Widget Văn bản','rt-theme'), $widget_ops, $control_ops);
    }

    function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';

        $text = apply_filters( 'classic_widget_text', $widget_text, $instance, $this );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) :
            echo $args['before_title'] . $title . $args['after_title'];
        endif; ?>
            <div class="classic-text-widget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
        <?php
        echo $args['after_widget'];

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        if ( current_user_can( 'unfiltered_html' ) ) :

            $instance['text'] = $new_instance['text'];

        else:

            $instance['text'] = wp_kses_post( $new_instance['text'] );

        endif;

        $instance['filter'] = ! empty( $new_instance['filter'] );

        return $instance;


    }

    function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
        $filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
        $title = sanitize_text_field( $instance['title'] );
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Tiêu đề :','rt-theme'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Nội dung :','rt-theme' ); ?></label>
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Tự động thêm đoạn','rt-theme'); ?></label></p>
        <?php

    }
}
?>