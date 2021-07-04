<?php

/**
 * Case studies Block Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value
$id = 'casestudy-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'casestudy';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values
$case_studies = get_field('bcs_case_study');

if ($case_studies) {
?>
    <div class="filter">
        <ul class="filter__menu">
            <li id="casestudy" class="filter__title active">All</li>
            <li id="e-commerce" class="filter__title">E-Commerce</li>
            <li id="websites" class="filter__title">Websites</li>
            <li id="design" class="filter__title">Design</li>
            <li id="seo" class="filter__title">SEO</li>
        </ul>
    </div>
    <div class="casestudies">
        <?php
        foreach ($case_studies as $case_study) {
            $bcs_select_case_study = $case_study['bcs_select_case_study'];
            $bcs_case_study_photo_id = $case_study['bcs_case_study_photo_id'];
            $photo_height = 315;
            if ($bcs_select_case_study == "big") {
                $photo_height = 500;
            }

            // array of case studies types
            $bcs_case_study_types = $case_study['bcs_case_study_types'];
            $bcs_case_study_types_value = array();
            $bcs_case_study_types_label = array();
            foreach ($bcs_case_study_types as $bcs_case_study_type) {
                array_push($bcs_case_study_types_value, $bcs_case_study_type['value']);
                array_push($bcs_case_study_types_label, $bcs_case_study_type['label']);
            }

            $bcs_case_study_title = $case_study['bcs_case_study_title'];

            // array of link data
            $bcs_case_study_link = $case_study['bcs_case_study_link'];
            $bcs_case_study_link_target = '';
            $bcs_case_study_link_href = $bcs_case_study_link['bcs_case_study_select_permalink'];
            if ($bcs_case_study_link['bcs_case_study_link_type'] == "external") {
                $bcs_case_study_link_target = ' target="_blank"';
                $bcs_case_study_link_href = $bcs_case_study_link['bcs_case_study_write_permalink'];
            }
        ?>
            <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className . ' ' . implode(" ", $bcs_case_study_types_value)); ?>">
                <div class="casestudy__box">
                    <div class="casestudy__photo">
                        <?php
                        echo wp_get_attachment_image($bcs_case_study_photo_id, array(570, $photo_height, 'bfi_thumb' => true));
                        ?>
                    </div>
                    <div class="casestudy__text">
                        <div class="casestudy__type">
                            <?php
                            echo implode(" / ", $bcs_case_study_types_label);
                            ?>
                        </div>
                        <h3 class="casestudy__title">
                            <?php
                            echo $bcs_case_study_title;
                            ?>
                        </h3>
                        <div class="casestudy__linkwrap">
                            <a href="<?php echo $bcs_case_study_link_href; ?>" class="casestudy__link" <?php echo $bcs_case_study_link_target; ?>>
                                <?php echo $bcs_case_study_link['bcs_case_study_permalink_text']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}

?>