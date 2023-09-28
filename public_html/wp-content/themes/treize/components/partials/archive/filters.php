<?php
// $taxonomy_slugs = ['slug-category', 'slug-category2']; code to insert into archive to auto generate filters
?>
<div id="checkbox-multi-filter" class="filter-section">
    <?php
    foreach ($taxonomy_slugs as $slug) :
      $taxonomy = get_taxonomy($slug);
      $terms = get_terms(array(
        'taxonomy' => $slug,
        'hide_empty' => true,
      ));
    ?>
        <div class="title" data-taxonomies="<?php echo ($slug); ?>"><?php echo $taxonomy->label ?></div>
        <div class="options">
            <?php foreach ($terms as $term) : ?>
                <label class="container single-filter" data-slug="<?php echo $term->slug ?>"><?php echo $term->name ?>
                    <input type="checkbox" value="<?php echo $term->slug ?>">
                    <span class="checkmark"></span>
                </label>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
