<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Options</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    
</head>

<body class="user">
    <?php
        include "../includes/sidebar.php";
    ?>
    <div>
        <h1>Options</h1>
        <p>Here is your options.</p>
    </div>

    <div class="calcu">
        help
        <form method="post" action="">
            <div class="input-group mb-3">
                <span class="input-group-text">Mean fish seed weight</span>
                <input type="number" class="form-control" name="FWS">
                <span class="input-group-text">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Holding density at harvest</span>
                <input type="number" class="form-control" name="HD">
                <span class="input-group-text">kg/ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Pond surface</span>
                <input type="number" class="form-control" name="PV">
                <span class="input-group-text">ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Survival rate of fish seed</span>
                <input type="number" class="form-control" name="SR">
                <span class="input-group-text">%</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Mean fish weight at harvest</span>
                <input type="number" class="form-control" name="FW">
                <span class="input-group-text">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Food conversion ratio</span>
                <input type="number" class="form-control" name="FCR">
                <span class="input-group-text"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Seed cost</span>
                <input type="number" class="form-control" name="SC">
                <span class="input-group-text">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Feed cost</span>
                <input type="number" class="form-control" name="FC">
                <span class="input-group-text">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Other cost</span>
                <input type="number" class="form-control" name="AC">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Interest rate for borrowed funds</span>
                <input type="number" class="form-control" name="IRC">
                <span class="input-group-text">%</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Fish price at harvest</span>
                <input type="number" class="form-control" name="FPH">
                <span class="input-group-text">₱/kg</span>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <input class="btn btn-success fs-4" type="submit" name="Result" value="Show Results">
                </div>
            </div>
        </form>
        
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $FWS=$_POST['FWS'];
                $HD=$_POST['HD'];
                $PV=$_POST['PV'];
                $SR=$_POST['SR'];
                $FW=$_POST['FW'];
                $FCR=$_POST['FCR'];
                $SC=$_POST['SC'];
                $FC=$_POST['FC'];
                $AC=$_POST['AC'];
                $IRC=$_POST['IRC'];
                $FPH=$_POST['FPH'];
                
                //calculation
                $HDN;
                $WH;
                $BH=0;
                $NS=0;
                $FN=0;
                $TSC=0;
                $TFC=0;
                $TC=0;
                $BEP=0;
                $REV=0;
                $PRO=0;
                $ROI=0;

                $Result=$_POST['Result'];
            }

            if(isset($Result)){
                $HDN = ($HD)/($FW-$FWS);
                $WH = $HD*$PV;
                $BH = $WH/$FW;
                $NS = $BH/$SR;
                $FN = $FCR*$WH;
                $TSC = $SC*$NS*$FWS;
                $TFC = $FC*$FN;
                $TC = ($TSC+$TFC+$AC)*(1 +($IRC/100));
                $BEP = $TC/$WH;
                $REV = $FPH*$WH;
                $PRO = $REV-$TC;
                $ROI = 100*($PRO/$TC);
            }
        ?>

        <div class="calculation">
            <div class="input-group mb-3">
                <span class="input-group-text">Holding density at harvest</span>
                <input type="number" class="form-control" name="HDN" value="<?php echo $HDN; ?>">
                <span class="input-group-text">kg/ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total weight of fish</span>
                <input type="number" class="form-control" name="WH" value="<?php echo $WH; ?>">
                <span class="input-group-text">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total fish biomass</span>
                <input type="number" class="form-control" name="BH" value="<?php echo $BH; ?>">
                <span class="input-group-text"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Number of seed</span>
                <input type="number" class="form-control" name="NS" value="<?php echo $NS; ?>">
                <span class="input-group-text"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Feed needed to produce biomass at harvest</span>
                <input type="number" class="form-control" name="FN" value="<?php echo $FN; ?>">
                <span class="input-group-text">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost for seed</span>
                <input type="number" class="form-control" name="TSC" value="<?php echo $TSC; ?>">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost for feed</span>
                <input type="number" class="form-control" name="TFC" value="<?php echo $TFC; ?>">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost</span>
                <input type="number" class="form-control" name="TC" value="<?php echo $TC; ?>">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Break-even price</span>
                <input type="number" class="form-control" name="BEP" value="<?php echo $BEP; ?>">
                <span class="input-group-text">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Revenue</span>
                <input type="number" class="form-control" name="REV" value="<?php echo $REV; ?>">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Profit</span>
                <input type="number" class="form-control" name="PRO" value="<?php echo $PRO; ?>">
                <span class="input-group-text">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Return of Investment</span>
                <input type="number" class="form-control" name="ROI" value="<?php echo $ROI; ?>">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
</body>

</html>