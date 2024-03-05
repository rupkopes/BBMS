<?php
// Assume $available_units is the variable holding available blood units for each type
header("Content-type: text/css");

// Calculate the stroke-dashoffset value for each blood type
$stroke_dashoffset_Aplus = 110 - (110 * $available_units['Aplus'] / 100);
$stroke_dashoffset_Bplus = 110 - (110 * $available_units['Bplus'] / 100);
// Repeat for other blood types

?>

/* Generated CSS */
main .insights .A+ svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Aplus; ?>;
    stroke-dasharray: 110;
}

main .insights .B+ svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .AB+ svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .O+ svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .A- svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .B- svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .AB- svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}

main .insights .O- svg circle {
    stroke-dashoffset: <?php echo $stroke_dashoffset_Bplus; ?>;
    stroke-dasharray: 110;
}