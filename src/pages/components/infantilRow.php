<div class="row row-title-space">
    <div class="col">
        <h1><?php echo $sectionTitle ?></h1>
    </div>
</div>
<div class="row row-margin">
    <div class="col-lg-6 content-image">
        <?php echo "<img class='thumb-image' id='".$sectionTitle."' src='".$sectionUrl."' alt='".$sectionTitle."' onClick=clickedThumbImage('".$sectionTitle."'); >" ?>
    </div>
    <div class="col-lg-6">
        <p class="p-desc"><?php echo $sectionDescription ?></p>
    </div>
</div>