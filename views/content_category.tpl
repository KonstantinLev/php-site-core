<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <section class="s-products">

                    <div class="row">
                        <h2>Товары</h2>
                        <?php if($this->products) { ?>
                            <p class="sort">
                                Сортировать по: цене (<a href="<?=$this->linkPriceUp?>">возр.</a> | <a href="<?=$this->linkPriceDown?>">убыв.</a>) названию (<a href="<?=$this->linkTitleUp?>">возр.</a> | <a href="<?=$this->linkTitleDown?>">убыв.</a>)
                            </p>
                            <?php foreach($this->products as $product) { ?>
                            <div class="col-md-4">
                                <div class="good-block">
                                    <p>Название товара: <?=$product['title']?></p>
                                    <p>Артикул: <?=$product['articul']?></p>
                                    <p>Цена: <?=$product['price']?></p>
                                    <p>
                                        фото товара:
                                        <img class="good-block-img" src="<?=$product['path_img']?>" alt="доделать">
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p>В данной категории товаров не найдено!</p>
                        <?php } ?>
                    </div>

            </section>
        </div>
    </div>
</div>