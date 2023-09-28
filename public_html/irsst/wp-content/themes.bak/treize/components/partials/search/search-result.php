<?php
$post_id = get_the_ID();
$post_type = get_post_type($post_id);
$post_type_object = get_post_type_object($post_type);
$place = $post_type_object->labels->singular_name;

if ($post_type === 'page') {
    $ancestors = get_post_ancestors($post_id);
    $oldest = array_pop($ancestors);
    $place = get_the_title($oldest);
} elseif ($post_type === 'post') {
    $place = __('Annexe', 'treize');
}
?>

<tr data-href="<?php the_permalink(); ?>">
    <td class="term"><?php the_title(); ?></td>
    <td class="place"><?php echo $place ?></td>
    <td class="action">
        <?php include(locate_template('assets/svg/small-arrow.svg')) ?>
    </td>
</tr>
