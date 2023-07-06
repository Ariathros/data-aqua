<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Calculations</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body >
    <?php
        include "../includes/sidebar.php";
    ?>
    <div class="calculations">
        <h1>Calculations</h1>
        <HR></HR>

        <form method="post" action="">
            <div class="input-group mb-3">
                <span class="input-group-text">Mean fish seed weight</span>
                <input type="number" class="form-control" name="FWS">
                <span class="input-group-text end">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Holding density at harvest</span>
                <input type="number" class="form-control" name="HD">
                <span class="input-group-text end">kg/ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Pond surface</span>
                <input type="number" class="form-control" name="PV">
                <span class="input-group-text end">ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Survival rate of fish seed</span>
                <input type="number" class="form-control" name="SR">
                <span class="input-group-text end">%</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Mean fish weight at harvest</span>
                <input type="number" class="form-control" name="FW">
                <span class="input-group-text end">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Food conversion ratio</span>
                <input type="number" class="form-control" name="FCR">
                <span class="input-group-text end"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Seed cost</span>
                <input type="number" class="form-control" name="SC">
                <span class="input-group-text end">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Feed cost</span>
                <input type="number" class="form-control" name="FC">
                <span class="input-group-text end">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Other cost</span>
                <input type="number" class="form-control" name="AC">
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Interest rate for borrowed funds</span>
                <input type="number" class="form-control" name="IRC">
                <span class="input-group-text end">%</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Fish price at harvest</span>
                <input type="number" class="form-control" name="FPH">
                <span class="input-group-text end">₱/kg</span>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <input class="btn btn-primary fs-5" type="submit" name="Result" value="Show Results">
                </div>
            </div>
        </form>
        
        <?php 
            $FWS=0;
            $HD=0;
            $PV=0;
            $SR=0;
            $FW=0;
            $FCR=0;
            $SC=0;
            $FC=0;
            $AC=0;
            $IRC=0;
            $FPH=0;

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

        <div>
            <div class="input-group mb-3">
                <span class="input-group-text">Holding density at harvest</span>
                <input type="number" class="form-control" name="HDN" value="<?php echo $HDN; ?>" DISABLED>
                <span class="input-group-text end">kg/ha</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total weight of fish</span>
                <input type="number" class="form-control" name="WH" value="<?php echo $WH; ?>" DISABLED>
                <span class="input-group-text end">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total fish biomass</span>
                <input type="number" class="form-control" name="BH" value="<?php echo $BH; ?>" DISABLED>
                <span class="input-group-text end"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Number of seed</span>
                <input type="number" class="form-control" name="NS" value="<?php echo $NS; ?>" DISABLED>
                <span class="input-group-text end"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Feed needed to produce biomass at harvest</span>
                <input type="number" class="form-control" name="FN" value="<?php echo $FN; ?>" DISABLED>
                <span class="input-group-text end">kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost for seed</span>
                <input type="number" class="form-control" name="TSC" value="<?php echo $TSC; ?>" DISABLED>
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost for feed</span>
                <input type="number" class="form-control" name="TFC" value="<?php echo $TFC; ?>" DISABLED>
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Total cost</span>
                <input type="number" class="form-control" name="TC" value="<?php echo $TC; ?>" DISABLED>
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Break-even price</span>
                <input type="number" class="form-control" name="BEP" value="<?php echo $BEP; ?>" DISABLED>
                <span class="input-group-text end">₱/kg</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Revenue</span>
                <input type="number" class="form-control" name="REV" value="<?php echo $REV; ?>" DISABLED>
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Profit</span>
                <input type="number" class="form-control" name="PRO" value="<?php echo $PRO; ?>" DISABLED>
                <span class="input-group-text end">₱</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Return of Investment</span>
                <input type="number" class="form-control" name="ROI" value="<?php echo $ROI; ?>" DISABLED>
                <span class="input-group-text end">%</span>
            </div>
        </div>
    </div>

    
</body>

</html>