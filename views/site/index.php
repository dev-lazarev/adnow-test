<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Mosaic!</h1>


    </div>

    <div class="body-content">

        <div class="row">

            <div class="col-lg-6">
                <h2>picture</h2>
                <?php
                for ($i=0;$i<20;$i++){
                    for ($j=0;$j<20;$j++){?>
                        <div id="i<?=$i?>j<?=$j?>" class="blank cell20"></div>
                        <?php
                    }
                    echo "<br />";
                }
                ?>
                <p><a class="btn btn-default" href="#" id="save">save</a></p>

                <form class="form-inline" id="form" style="display: none">
                    <div class="form-group">
                        <label for="name" class="sr-only">name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <input type="hidden" class="form-control" id="id"  name="id" value="">
                    </div>
                    <button type="submit" class="btn btn-default">ok</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h2>list</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>createdate</th>
                        <th>date</th>
                        <th>time</th>
                        <th>-</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($mosaics as $mosaic){
                        ?>
                        <tr>
                            <th><?=$mosaic->name?></th>
                            <th><?=$mosaic->createdate?><</th>
                            <th><?=isset($mosaic->date)?$mosaic->date:'-'?></th>
                            <th><?=isset($mosaic->time)?$mosaic->time:'-'?></th>
                            <th><span class="glyphicon glyphicon-load" aria-hidden="true"></span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
