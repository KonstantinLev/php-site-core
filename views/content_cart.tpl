<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="s-cart">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Товар</th>
                        <th>Артикул</th>
                        <th>Цена ща 1 шт</th>
                        <th>Кол-во</th>
                        <th>Стоимость</th>
                        <th></th>
                    </tr>
                    <?php  ?>
                        <?php foreach($this->cartItems as $val) { ?>
                            <tr>
                                <td><?=$val['title']?></td>
                                <td><?=$val['articul']?></td>
                                <td><?=$val['price']?></td>
                                <td><input type="text" name="count" value="<?=$val['count']?>"></td>
                                <td><?=$val['summ']?></td>
                                <td><a href="<?=$val['link_del']?>">Удалить</a></td>
                            </tr>
                        <?php } ?>
                    <?php  ?>
                </table>
                <p>Итого: <b><?=$this->summ?></b></p>
            </section>
        </div>
    </div>
</div>