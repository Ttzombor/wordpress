<?php

class WP_My_Widget extends WP_Widget {

/**
* Sets up the widgets name etc
*/
public function __construct() {
$widget_ops = array(
'classname' => 'Top users',
'description' => 'Top users by comments',
);
parent::__construct( 'my_widget', 'Top users', $widget_ops );
}

/**
* Outputs the content of the widget
*
* @param array $args
* @param array $instance
*/
public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    if ( ! $number ) {
        $number = 5;
    }


    $user_array = array();

    $users = get_users();
    $zero_comments = $instance['zero_comments'];
    $id = 0;
    foreach ($users as $user){
        $args = array(
               'user_id' => $user->ID
        );
        $comments = get_comments( $args );

        if(!$zero_comments && !$comments)  continue;
        $i = 0;
        $user_array[$id]['user_id'] = $user->ID;
        $user_array[$id]['user_name'] = $user->user_login;
        $user_array[$id]['number_of_comments'] =$i;
            foreach ($comments as $comment) {

                $user_array[$id]['comment_content'][$i] = $comment->comment_content;
                $user_array[$id]['number_of_comments'] = ++$i;

            }
        ++$id;
            if($id == $number) break;
    }
    sort($user_array);
?>
    <ol>
    <?php
    $i = 1;
    foreach($user_array as $item){
        ?>
            <li ><?php
                if($instance['number_of_comments'])
                    echo $i .". ". $item['user_name'] . " (" . $item['number_of_comments'] . ")";
                else
                    echo $i .". ". $item['user_name'] ;
                ?></li>

        <?php
        ++$i;
    }

    ?>
    </ol>
<?php
    echo $args['after_widget'];
}

/**
* Outputs the options form on admin
*
* @param array $instance The widget options
*/
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $number_of_comments = isset( $instance['number_of_comments'] ) ? $instance['number_of_comments'] : true;
    $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    $zero_comments = isset( $instance['zero_comments'] ) ? $instance['zero_comments'] : true ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <label for="<?php echo $this->get_field_id( 'number_of_comments' ); ?>">Number of comments:</label>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'number_of_comments' ], 'on' ); ?> id="<?php echo
    $this->get_field_id( 'number_of_comments' ); ?>" name="<?php echo $this->get_field_name( 'number_of_comments' ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo(
                'Number of users :' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
    <p>
    <label for="<?php echo $this->get_field_id( 'zero_comments' ); ?>">Zero comments users:</label>
        <input class="checkbox" type="checkbox" <?php checked( $instance[ 'zero_comments' ], 'on' ); ?> id="<?php echo
        $this->get_field_id( 'zero_comments' ); ?>" name="<?php echo $this->get_field_name( 'zero_comments' ); ?>" />
    </p>
    <?php
}

/**
* Processing widget options on save
*
* @param array $new_instance The new options
* @param array $old_instance The previous options
*
* @return array
*/
public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance['number_of_comments'] = $new_instance['number_of_comments'];
    $instance['number'] = absint( $new_instance['number'] );
    $instance['zero_comments'] = $new_instance['zero_comments'];
    return $instance;
}
}