<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://car2db.com
 * @since      1.0.0
 *
 * @package    Car2db
 * @subpackage Car2db/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="widget-text wp_widget_plugin_box">

<form id="car2db-form" class="car2db-form" action="<?= $formAction ?>" method="get">
<?php 
	// Display widget title if defined
	if ( $title ) {
	    echo "<div class=\"widget-title\">{$title}</div>";
	}

	// Display description field
	if ( $description ) {
		echo "<div class=\"widget-description\">{$description}</div>";
	}
?>

    <div class="row">
        <div class="col-sm-4"><label for="carType"><?= $vehicleTypeLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carType" id="carType">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carMake"><?= $makeLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carMake" id="carMake">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carModel"><?= $modelLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carModel" id="carModel">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carGeneration"><?= $generationLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carGeneration" id="carGeneration">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carSeries"><?= $seriesLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carSeries" id="carSeries">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carTrim"><?= $trimLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carTrim" id="carTrim">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="carEquipment"><?= $equipmentLabel ?></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="carEquipment" id="carEquipment">
                <option value="">-</option>
            </select>
        </div>
    </div>

	<input class="search-submit" type="submit" value="<?= $submitButtonText ?>">
</form>

</div>