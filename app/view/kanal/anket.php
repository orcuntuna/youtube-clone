<form action="" method="post">
    <div class="anketler">

    <div class="anket">
        <p><i class="fa fa-question-circle"></i> Bu kanalın içeriklerinden memnun musunuz? <?php if(uyelik_kontrol()){ anket_cevap($kanal_id, 1, $_SESSION["uye_id"]); } ?></p>
        
        <?php
        
        if(!isset($anket_kontrol)){
            ?>

            <div class="cevaplar">
                <label class="evet"><input required type="radio" name="1" value="1"> Evet</label>
                <label class="hayir"><input type="radio" name="1" value="0"> Hayır</label>
            </div>

            <?php
        }

        ?>
        <div class="sonuclar">
            <progress value="<?php echo anket_sonuc($kanal_id, 1); ?>" max="100"></progress>
            <span>%<?php echo anket_sonuc($kanal_id, 1); ?></span>
        </div>
    </div>

    <div class="anket">
        <p><i class="fa fa-question-circle"></i> Bu kanalı sıklıkla takip ediyor musunuz? <?php if(uyelik_kontrol()){ anket_cevap($kanal_id, 2, $_SESSION["uye_id"]); } ?></p>
        <?php
        
        if(!isset($anket_kontrol)){
            ?>

            <div class="cevaplar">
                <label class="evet"><input required type="radio" name="2" value="1"> Evet</label>
                <label class="hayir"><input type="radio" name="2" value="0"> Hayır</label>
            </div>

            <?php
        }

        ?>
        <div class="sonuclar">
            <progress value="<?php echo anket_sonuc($kanal_id, 2); ?>" max="100"></progress>
            <span>%<?php echo anket_sonuc($kanal_id, 2); ?></span>
        </div>
    </div>

    <div class="anket">
        <p><i class="fa fa-question-circle"></i> Bu kanal çocuklara uygun mu? <?php if(uyelik_kontrol()){ anket_cevap($kanal_id, 3, $_SESSION["uye_id"]); } ?></p>
        <?php
        
        if(!isset($anket_kontrol)){
            ?>

            <div class="cevaplar">
                <label class="evet"><input required type="radio" name="3" value="1"> Evet</label>
                <label class="hayir"><input type="radio" name="3" value="0"> Hayır</label>
            </div>

            <?php
        }

        ?>
        <div class="sonuclar">
            <progress value="<?php echo anket_sonuc($kanal_id, 3); ?>" max="100"></progress>
            <span>%<?php echo anket_sonuc($kanal_id, 3); ?></span>
        </div>
    </div>

    <div class="anket">
        <p><i class="fa fa-question-circle"></i> Bu kanalı arkadaşlarınıza tavsiye eder misiniz? <?php if(uyelik_kontrol()){ anket_cevap($kanal_id, 4, $_SESSION["uye_id"]); } ?></p>
        <?php
        
        if(!isset($anket_kontrol)){
            ?>

            <div class="cevaplar">
                <label class="evet"><input required type="radio" name="4" value="1"> Evet</label>
                <label class="hayir"><input type="radio" name="4" value="0"> Hayır</label>
            </div>

            <?php
        }

        ?>
        <div class="sonuclar">
            <progress value="<?php echo anket_sonuc($kanal_id, 4); ?>" max="100"></progress>
            <span>%<?php echo anket_sonuc($kanal_id, 4); ?></span>
        </div>
    </div>

    <div class="gonder">
    <?php

    if(isset($anket_kontrol)){
        if(uyelik_kontrol()){
            echo '<button disabled class="gonderildi" type="submit">Bu kanal için daha önce anket doldurdunuz.</button>';
        }else{
            echo '<button disabled class="gonderildi" type="submit">Anket doldurmak için giriş yapmalısınız.</button>';
        }
    }else{
        echo '<button type="submit">Anketi Gönder</button>';
    }

    ?>
        
    </div>

    </div>
</form>